<?php

namespace App\Http\Controllers;

use App\Research;
use Auth;
use Illuminate\Http\Request;
use Validator;

class researchController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        // if user is not admin go to home
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'company_name' => 'required|max:255',
            'sector' => 'required|max:255',
            'type' => 'required|max:255',
            'document' => 'required|max:4294967290',
        ])->validate();

        $research = Research::create($request->all());
        return view('research.edit', compact('research'));
    }

    public function show($id)
    {
        $research = Research::where('id', $id)->first();
        if ($research) {
            return view('research.show', compact('research'));
        }
        $error='No Research exists with this ID.';
        return redirect()->back()->with('error', $error);
    }

    public function edit($id)
    {
        $research = Research::where('id', $id)->with('images')->first();
        // if ($research && (Auth::user()->user_type == 'admin')) {
        if ($research) {
            return view('Research.edit', compact('research'));
        } else {
            $error = 'Only Admin can edit the Research.';
            return redirect()->back()->with('error',$error);
        }
    }

    public function update(Request $request, $id)
    {
        $updatedResearch = Research::where('id', $id)->first();

        Validator::make($request->all(), [
            'company_name' => 'required|max:255',
            'sector' => 'required|max:255',
            'type' => 'required|max:255',
            'document' => 'required|max:4294967290',
        ])->validate();
        
        $updatedResearch->update($request->all());
        return redirect()->back();
    }

    public function destroy($id)
    {
        Research::where('id', $id)->first()->delete();
        return redirect()->back();
    }
}
