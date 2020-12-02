<?php

namespace App\Http\Controllers;
use App\Research;
use App\Portfolio;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
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
}
