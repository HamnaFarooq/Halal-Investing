<?php

namespace App\Http\Controllers;

use App\Research;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Validator;
use DateTime;

class researchController extends Controller
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
            'sector' => 'required|max:255',
            'type' => 'required|max:255',
            'document' => 'required|max:4294967290',
        ])->validate();

        $research = Research::create($request->all());
        return view('research.edit', compact('research'));
        }
        return redirect()->back()->with('errormsg', 'You do not have access to add a research.');
    }

    public function show($id)
    {
        $research = Research::where('id', $id)->first();
        if ($research) {
            return view('research.show', compact('research'));
        }
        return redirect()->back()->with('errormsg', 'No Research exists with this ID');
    }

    public function edit($id)
    {
        if (Auth::user()->user_type == 'admin') {
            $research = Research::where('id', $id)->with('images')->first();
            if ($research) {
                return view('Research.edit', compact('research'));
            } else {
                return redirect()->back()->with('errormsg', 'Research not found in the database.');
            }
        }
        return redirect()->back()->with('errormsg', 'You do not have access to edit a research.');
    }

    public function update(Request $request, $id)
    {
        if (Auth::user()->user_type == 'admin') {
            $updatedResearch = Research::where('id', $id)->first();

            Validator::make($request->all(), [
                'company_name' => 'required|max:255',
                'sector' => 'required|max:255',
                'type' => 'required|max:255',
                'document' => 'required|max:4294967290',
            ])->validate();

            $updatedResearch->update($request->all());
            return redirect()->back()->with('success', 'Research data edited successfully.');
        }
        return redirect()->back()->with('errormsg', 'You do not have access to edit a Reaserch.');
    }

    public function destroy($id)
    {
        if (Auth::user()->user_type == 'admin') {
            Research::where('id', $id)->first()->delete();
            return redirect()->back()->with('success', 'Research deleted successfully.');
        }
        return redirect()->back()->with('errormsg', 'You do not have access to delete Research.');
    }

    public function subscribed()
    {
        $usr = User::where('id', Auth::id())->first();
        if ($usr->reports_starts_at) {
            $ends = new Datetime($usr->reports_ends_at);
            date_add($ends, date_interval_create_from_date_string('365 days'));
            $usr->update(['reports' => 'subscribed', 'reports_ends_at' => $ends]);
        } else {
            $usr->update(['reports' => 'subscribed', 'reports_starts_at' => today(), 'reports_ends_at' => today()->addDays(365)]);
        }
        $usr->save();
        app('App\Http\Controllers\MailController')->reports_subscribed($usr->portfolio_ends_at);
        return redirect('/research_reports')->with('success', 'Thank you for Subscribing to Our Research Reports');
    }
}
