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
        Validator::make($request->all(), [
            'company_name' => 'required|max:255',
            'share_percentage' => 'required|numeric|max:100|min:1',
            'action' => 'required|max:255',
            'share_price' => 'required|numeric',
            'date' => 'required|max:255',
        ])->validate();

        portfolio::create($request->all());
        return redirect()->back();
    }

    // public function show($id)
    // {
    //     $portfolio = portfolio::where('id', $id)->first();
    //     if ($portfolio) {
    //         return view('portfolio.show', compact('portfolio'));
    //     }
    //     $error='No portfolio exists with this ID.';
    //     return redirect()->back()->with('error', $error);
    // }

    // public function edit($id)
    // {
    //     $portfolio = portfolio::where('id', $id)->first();
    //     // if ($portfolio && (Auth::user()->user_type == 'admin')) {
    //     if ($portfolio) {
    //         return view('portfolio.edit', compact('portfolio'));
    //     } else {
    //         $error = 'Only Admin can edit the portfolio.';
    //         return redirect()->back()->with('error',$error);
    //     }
    // }

    public function update(Request $request, $id)
    {
        $updatedportfolio = portfolio::where('id', $id)->first();

        Validator::make($request->all(), [
            'company_name' => 'required|max:255',
            'share_percentage' => 'required|numeric|max:255',
            'action' => 'required|max:255',
            'share_price' => 'required|numeric',
            'date' => 'required|max:255',
        ])->validate();
        
        $updatedportfolio->update($request->all());
        return redirect()->back();
    }

    public function destroy($id)
    {
        portfolio::where('id', $id)->first()->delete();
        return redirect()->back();
    }
}
