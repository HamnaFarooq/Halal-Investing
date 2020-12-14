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
            'expected_by' => 'date|after:todayrequired|max:255',
            'request' => 'required|max:4294967290',
        ])->validate();

        $request->merge(['status' => 'Pending']);
        $request->merge(['user_id' => Auth::id()]);
        $request = research_requests::create($request->all());

        return redirect()->back();
    }

    // public function show($id)
    // {
    //     $request = research_requests::where('id', $id)->first();
    //     if ($request) {
    //         return view('request.show', compact('request'));
    //     }
    //     $error='No request exists with this ID.';
    //     return redirect()->back()->with('error', $error);
    // }

    // public function edit($id)
    // {
    //     $request = research_requests::where('id', $id)->with('images')->first();
    //     // if ($request && (Auth::user()->user_type == 'admin')) {
    //     if ($request) {
    //         return view('request.edit', compact('request'));
    //     } else {
    //         $error = 'Only Admin can edit the request.';
    //         return redirect()->back()->with('error',$error);
    //     }
    // }

    // public function update(Request $request, $id)
    // {
    //     $updatedrequest = research_requests::where('id', $id)->first();

    //     Validator::make($request->all(), [
    //         'company_name' => 'required|max:255',
    //         'sector' => 'required|max:255',
    //         'expected_by' => 'date|after:todayrequired|max:255',
    //         'comments' => 'required|max:4294967290',
    //     ])->validate();
        
    //     $updatedrequest->update($request->all());
    //     return redirect()->back();
    // }

    public function destroy($id)
    {
        $req = research_requests::where('id', $id)->first();
        if($req->user_id == Auth::id() || Auth::user()->user_type == "admin")
        {
            $req->delete();
        }
        return redirect()->back();
    }
}
