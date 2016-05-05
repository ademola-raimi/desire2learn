<?php

namespace Desire2Learn\Http\Controllers;

use Illuminate\Http\Request;

use Desire2Learn\Http\Requests;

class HomeController extends Controller
{
    public function index()
    {
    	return view('layout.home');
    }
}
