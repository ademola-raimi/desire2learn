<?php

namespace Desire2Learn\Http\Controllers;

use Desire2Learn\User;
use Desire2Learn\Video;
use Desire2Learn\Category;
use Illuminate\Http\Request;
use Desire2Learn\Http\Requests;

class HomeController extends Controller
{
	/**
     * This method displays the index page with all the videos and categories
     * of the application
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$video      = Video::paginate(9);
    	$categories = Category::all();

    	return view('layout.home', compact('video', 'categories'));
    }
}
