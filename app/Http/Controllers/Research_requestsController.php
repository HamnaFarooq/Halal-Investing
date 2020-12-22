<?php

namespace App\Http\Controllers;

use App\Research_requests;
use Auth;
use Illuminate\Http\Request;
use Validator;

class Research_requestsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'company_name' => 'required|max:255',
            'sector' => 'required|max:255',
            'expected_by' => 'date|after:today|required|max:255',
            'request' => 'max:4294967290',
        ])->validate();

        $request->merge(['status' => 'Pending']);
        $request->merge(['user_id' => Auth::id()]);
        $request = research_requests::create($request->all());

        app('App\Http\Controllers\MailController')->report_requested($request->company_name);

        return redirect()->back()->with('success', 'Request submitted successfully.');
    }

    public function upfront_payment( $id)
    {
        $req = Research_requests::where('id', $id)->first();
        if($req && $req->user_id == Auth::id() )
        {
            $req->update(['status'=>'Accepted', 'comments'=> 'Research in progress', 'price' => 250 ]);
            $req->save();
            return redirect()->back()->with('success', 'Request accepted.');
        }
        return redirect()->back()->with('errormsg', 'You do not have access to accept requests.');
    }

    public function complete_payment( $id)
    {
        $req = Research_requests::where('id', $id)->first();
        if($req && $req->user_id == Auth::id() )
        {
            $newprice = $req->price + 250;
            $req->update([ 'price' => $newprice ]);
            $req->save();
            return redirect()->back()->with('success', 'Request accepted.');
        }
        return redirect()->back()->with('errormsg', 'You do not have access to accept requests.');
    }

    public function destroy($id)
    {
        $req = research_requests::where('id', $id)->first();
        if($req->user_id == Auth::id() || Auth::user()->user_type == "admin")
        {
            $req->delete();
            return redirect()->back()->with('success', 'Deleted successfully.');
        }
        return redirect()->back()->with('errormsg', 'You do not have access to delete this request.');

    }
}
