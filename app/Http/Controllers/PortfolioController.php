<?php

namespace App\Http\Controllers;

use App\Portfolio;
use Auth;
use Illuminate\Http\Request;
use Validator;

class portfolioController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        // if user is not admin go to home
    }

    public function store(Request $request)
    {
        if (Auth::user()->user_type == 'admin') {
            Validator::make($request->all(), [
                'company_name' => 'required|max:255',
                'share_percentage' => 'required|numeric|max:100|min:1',
                'action' => 'required|max:255',
                'share_price' => 'required|numeric',
                'date' => 'required|max:255',
            ])->validate();

            portfolio::create($request->all());
            return redirect()->back()->with('success', 'Portfolio added successfully.');
        }
        return redirect()->back()->with('errormsg', 'You do not have access to add a portfolio.');
    }

    public function update(Request $request, $id)
    {
        if (Auth::user()->user_type == 'admin') {
            $updatedportfolio = portfolio::where('id', $id)->first();

            Validator::make($request->all(), [
                'company_name' => 'required|max:255',
                'share_percentage' => 'required|numeric|max:255',
                'action' => 'required|max:255',
                'share_price' => 'required|numeric',
                'date' => 'required|max:255',
            ])->validate();

            $updatedportfolio->update($request->all());
            return redirect()->back()->with('success', 'Portfolio edited successfully.');
        }
        return redirect()->back()->with('errormsg', 'You do not have access to edit a portfolio.');
    }

    public function destroy($id)
    {
        if (Auth::user()->user_type == 'admin') {
            portfolio::where('id', $id)->first()->delete();
            return redirect()->back()->with('success', 'Portfolio deleted successfully.');
        }
        return redirect()->back()->with('errormsg', 'You do not have access to edit a portfolio.');
    }
}
