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
        Validator::make($request->all(), [
            'question' => 'required|max:4294967290',
            'answer' => 'required|max:4294967290',
        ])->validate();

        FAQ::create($request->all());
        return redirect()->back();
    }
    
    public function update(Request $request, $id)
    {
        $faq = FAQ::where('id', $id)->first();

        Validator::make($request->all(), [
            'question' => 'required|max:4294967290',
            'answer' => 'required|max:4294967290',
        ])->validate();
        
        $faq->update($request->all());
        return redirect()->back();
    }

    public function destroy($id)
    {
        FAQ::where('id', $id)->first()->delete();
        return redirect()->back();
    }
}
