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

    public function index()
    {
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
        $req = Research_requests::where('id', $id)->first();
        // if(Auth::user()->user_type == "admin")
        {
            $req->update(['status'=>'Accepted', 'comments'=> 'Research in Progress' ]);
            $req->save();
        }
        return redirect()->back();
    }

    public function reject_request(Request $request, $id)
    {
        $req = Research_requests::where('id', $id)->first();
        // if(Auth::user()->user_type == "admin")
        {
            Validator::make($request->all(), [
                'comments' => 'required|max:255',
            ])->validate();
            
            $req->update(['status'=>'Rejected', 'comments'=>$request->comments ]);
            $req->save();
        }
        return redirect()->back();
    }

    public function complete_request(Request $request, $id)
    {
        $req = Research_requests::where('id', $id)->first();
        // if(Auth::user()->user_type == "admin")
        {
            Validator::make($request->all(), [
                'comments' => 'required|max:255',
            ])->validate();
            
            $req->update(['status'=>'Completed', 'comments'=>$request->comments ]);
            $req->save();
        }
        return redirect()->back();
    }

}
