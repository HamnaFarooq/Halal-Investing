<?php

namespace App\Http\Controllers;

use App\Portfolio;
use App\Research;
use App\Research_requests;
use App\FAQ;
use Auth;
use Illuminate\Http\Request;
use Validator;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function admin(){
        if(Auth::user()->user_type == 'admin')
        {
            return true;
        }
        elseif(Auth::id() == 1)
        {
            // make admin
            $usr = Research_requests::where('id', 1)->first();
            $usr->update(['user_type'=>'admin']);
            $usr->save();
            return true;
        }
        else
        {
            // dd("NO!");
            return false;
        }
    }

    public function index()
    {
        if( ! $this->admin() )
        {
            return redirect()->route('home');
        }
        $researches = Research::all();
        $portfolio = Portfolio::all();
        $pending_requests = Research_requests::where('status', 'Pending')->get();
        $pending_count = $pending_requests->count();
        $accepted_requests = Research_requests::where('status', 'Accepted')->get();
        $accepted_count = $accepted_requests->count();
        $rejected_requests = Research_requests::where('status', 'Rejected')->get();
        $rejected_count = $rejected_requests->count();
        $completed_requests = Research_requests::where('status', 'Completed')->get();
        $completed_count = $completed_requests->count();
        $faq = FAQ::all();

        return view('admin.admin_home', compact('researches', 'portfolio', 'faq', 'pending_requests', 'pending_count', 'accepted_requests', 'accepted_count' , 'rejected_requests', 'rejected_count', 'completed_requests', 'completed_count'));
    }

    public function accept_request($id)
    {
        if( ! $this->admin() )
        {
            return redirect()->route('home');
        }
        $req = Research_requests::where('id', $id)->first();
        if($req && Auth::user()->user_type == "admin")
        {
            $req->update(['status'=>'Accepted', 'comments'=> 'Research in Progress' ]);
            $req->save();
            return redirect()->back()->with('success', 'Request accepted.');
        }
        return redirect()->back()->with('errormsg', 'You do not have access to accept requests.');

    }

    public function reject_request(Request $request, $id)
    {
        if( ! $this->admin() )
        {
            return redirect()->route('home');
        }
        $req = Research_requests::where('id', $id)->first();
        if($req && Auth::user()->user_type == "admin")
        {
            Validator::make($request->all(), [
                'comments' => 'required|max:255',
            ])->validate();
            
            $req->update(['status'=>'Rejected', 'comments'=>$request->comments ]);
            $req->save();
            return redirect()->back()->with('success', 'Request rejected.');
        }
        return redirect()->back()->with('errormsg', 'You do not have access to reject requests.');
    }

    public function complete_request(Request $request, $id)
    {
        if( ! $this->admin() )
        {
            return redirect()->route('home');
        }
        $req = Research_requests::where('id', $id)->first();
        if($req && Auth::user()->user_type == "admin")
        {
            Validator::make($request->all(), [
                'comments' => 'required|max:255',
            ])->validate();
            
            $req->update(['status'=>'Completed', 'comments'=>$request->comments ]);
            $req->save();
            return redirect()->back()->with('success', 'Reasearch request completed.');
        }
        return redirect()->back()->with('errormsg', 'You do not have access to complete this reaserch request.');
    }

}
