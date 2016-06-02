<?php

namespace Desire2Learn\Http\Controllers;

use Auth;
use Desire2Learn\Video;
use Desire2Learn\Category;
use Illuminate\Http\Request;
use Desire2Learn\Http\Requests;

class DashboardController extends Controller
{
    public function index()
    {
    	$reactions      = Auth::user()->likes();
    	$uploadedVideos = Auth::user()->videos();
    	$views          = Auth::user()->views();

    	return view('dashboard.index', compact('reactions', 'uploadedVideos', 'views'));
    }

    public function uploadedVideos()
    {
    	$uploadedVideo = Auth::user()->videos()->paginate(3);

    	return view('dashboard.video.uploadedvideo', compact('uploadedVideo'));
    }

    public function showCategories()
    {
    	$category = Category::all();

    	return view('dashboard.category.showcategories', compact('category'));
    }

    public function uploadedCategory()
    {
        $uploadedCategory = Auth::user()->categories()->paginate(9);

        return view('dashboard.category.uploadedcategories', compact('uploadedCategory'));
    }
}
