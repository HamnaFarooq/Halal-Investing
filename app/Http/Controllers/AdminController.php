<?php

namespace App\Http\Controllers;

use App\Portfolio;
use App\Research;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $researches = Research::all();
        $portfolio = Portfolio::all();
        return view('admin.admin_home', compact('researches', 'portfolio'));
    }

}
