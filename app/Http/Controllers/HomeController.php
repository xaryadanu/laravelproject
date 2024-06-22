<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\spareparts;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $allSpareparts = spareparts::get();
        return view('home',compact('allSpareparts'));
    }
}
