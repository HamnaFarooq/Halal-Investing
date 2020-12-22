<?php

namespace App\Http\Controllers;
use App\Research;
use App\Portfolio;
use App\Research_requests;
use App\FAQ;
// use Mail;
use Auth;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::user() && Auth::user()->user_type == 'admin')
        {
            return redirect('/admin');
        }
        return view('welcome');
    }

    public function request_report()
    {
        $research = Research::where('type','free')->inRandomOrder()->get()->first();
        return view('request_report', compact('research'));
    }

    public function research_reports()
    {
        $researches = Research::all();
        return view('research_reports', compact('researches'));
    }

    public function portfolio()
    {
        $portfolio = Portfolio::all();
        return view('portfolio', compact('portfolio'));
    }

    public function my_requests()
    {
        $research_requests = Research_requests::where('user_id',Auth::id())->get();
        return view('my_requests', compact('research_requests'));
    }

    public function faq()
    {
        $faq = FAQ::all();
        return view('faq', compact('faq'));
    }

    public function about_us()
    {
        return view('about_us');
    }

    public function desclaimer()
    {
        return view('desclaimer');
    }

    public function contact_us()
    {
        return view('contact_us');
    }
}
