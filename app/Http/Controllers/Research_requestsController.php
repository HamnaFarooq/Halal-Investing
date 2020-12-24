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

    public function destroy($id)
    {
        $req = research_requests::where('id', $id)->first();
        if ($req->user_id == Auth::id() || Auth::user()->user_type == "admin") {
            $req->delete();
            return redirect()->back()->with('success', 'Deleted successfully.');
        }
        return redirect()->back()->with('errormsg', 'You do not have access to delete this request.');
    }

    private function half_payment($id)
    {
        $req = Research_requests::where('id', $id)->first();
        if ($req && $req->user_id == Auth::id()) {
            $req->update(['status' => 'Accepted', 'comments' => 'Research in progress', 'paid' => 'half']);
            $req->save();
            return true;
        }
        return false;
    }

    private function full_payment($id)
    {
        $req = Research_requests::where('id', $id)->first();
        if ($req && $req->user_id == Auth::id()) {
            // $newprice = $req->price + 250;
            $req->update(['paid' => 'full']);
            $req->save();
            return true;
        }
        return false;
    }

    public function paymentscreen($id)
    {
        $company = Research_requests::where('id', $id)->first();
        $company = $company->company_name;
        return view('payment', compact('company'));
    }

    public function paid($id)
    {
        $req = Research_requests::where('id', $id)->first();
        if ($req->paid == '') {
            // half paid
            if ($this->half_payment($id)) {
                return redirect('/my_requests')->with('success', 'Half Payment complete. You will pay the other half before opening the report delivery.');
            } else {
                return redirect()->back()->with('errormsg', 'You do not have access.');
            }
        } else if ($req->paid == 'half') {
            // full paid
            if ($this->full_payment($id)) {
                return redirect('/my_requests')->with('success', 'Payment complete. You can now open the delivered report');
            } else {
                return redirect()->back()->with('errormsg', 'You do not have access.');
            }
        } else {
            return redirect('/my_requests')->with('errormsg', 'There was some problem. Please contact us so we can make sure that your payment was marked as recieved.');
        }
    }
}
