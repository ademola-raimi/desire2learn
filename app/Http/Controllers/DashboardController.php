<?php

namespace Desire2Learn\Http\Controllers;

use Illuminate\Http\Request;

use Desire2Learn\Http\Requests;

class DashboardController extends Controller
{
    public function index()
    {
    	return view('dashboard.main');
    }
}
