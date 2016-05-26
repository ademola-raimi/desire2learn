<?php

namespace Desire2Learn\Http\Controllers;

use Desire2Learn\User;
use Desire2Learn\Video;
use Illuminate\Http\Request;
use Desire2Learn\Http\Requests;
use Desire2Learn\Http\Repository\VideoRepository;

class HomeController extends Controller
{
    public function index()
    {
    	$video = Video::paginate(9);

    	return view('layout.home', compact('video', 'user'));
    }
}
