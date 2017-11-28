<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

	// Authenication Middleware 
	
 //    public function __construct()
 //    {
 //        $this->middleware('auth');
 //    }

    public function index()
    {
        return view('home');
    }

    public function getHomepage()
    {
    	return view('pages.home');
    }
}
