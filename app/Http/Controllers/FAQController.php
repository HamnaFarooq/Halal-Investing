<?php

namespace App\Http\Controllers;

use App\FAQ;
use Illuminate\Http\Request;
use Validator;

class FAQController extends Controller
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
                'question' => 'required|max:4294967290',
                'answer' => 'required|max:4294967290',
            ])->validate();

            FAQ::create($request->all());
            return redirect()->back()->with('success', 'Question added successfully.');
        }
        return redirect()->back()->with('errormsg', 'You do not have access to add a question.');
    }

    public function update(Request $request, $id)
    {
        $faq = FAQ::where('id', $id)->first();

        if ($faq && Auth::user()->user_type == 'admin') {
            Validator::make($request->all(), [
                'question' => 'required|max:4294967290',
                'answer' => 'required|max:4294967290',
            ])->validate();

            $faq->update($request->all());
            return redirect()->back()->with('success', 'Question edited successfully.');
        }
        return redirect()->back()->with('errormsg', 'You do not have access to edit this question.');
    }

    public function destroy($id)
    {
        if (Auth::user()->user_type == 'admin') {
            FAQ::where('id', $id)->first()->delete();
            return redirect()->back()->with('success', 'Question deleted successfully.');
        }
        return redirect()->back()->with('errormsg', 'You do not have access to delete this question.');
    }
}
