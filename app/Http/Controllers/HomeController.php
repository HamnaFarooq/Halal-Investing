<?php

namespace App\Http\Controllers;
use App\Research;
use App\Portfolio;
use App\Research_requests;
use App\FAQ;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function request_report()
    {
        return view('request_report');
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
        // $portfolio = Portfolio::all();
        // return view('portfolio', compact('portfolio'));
        return view('faq');
    }

    public function about_us()
    {
        // $portfolio = Portfolio::all();
        // return view('portfolio', compact('portfolio'));
    }

    // public function portfolio()
    // {
    //     $portfolio = Portfolio::all();
    //     return view('portfolio', compact('portfolio'));
    // }
}
