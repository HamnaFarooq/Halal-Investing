<?php

namespace App\Http\Controllers;

use App\Portfolio;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Validator;
use DateTime;

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

            app('App\Http\Controllers\MailController')->portfolioupdate($request->company_name, $request->share_percentage, $request->action, $request->share_price);

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

    public function subscribed()
    {
        $usr = User::where('id', Auth::id())->first();
        if ($usr->portfolio_starts_at) {
            // get ends at and add 365 days to it
            $ends = new Datetime($usr->portfolio_ends_at);
            date_add($ends, date_interval_create_from_date_string('365 days'));
            $usr->update(['portfolio' => 'subscribed', 'portfolio_ends_at' => $ends]);
            // dd($usr);
        } else {
            // add today to starts
            // get today add365 days and put it on ends
            $usr->update(['portfolio' => 'subscribed', 'portfolio_starts_at' => today(), 'portfolio_ends_at' => today()->addDays(365)]);
            // dd($usr);
        }
        // if there is a start date, so change start date as well
        $usr->save();
        app('App\Http\Controllers\MailController')->subscribed(today());
        return redirect()->back()->with('success', 'Subscribed to protfolio successfully');
    }
}
