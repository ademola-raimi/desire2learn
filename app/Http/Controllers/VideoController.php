<?php

namespace Desire2Learn\Http\Controllers;

use Illuminate\Http\Request;

use Desire2Learn\Http\Requests;

class VideoController extends Controller
{
    public function createVideo()
    {
    	return view('dashboard.video.uploadform');
    }

    public function postVideo(Request $request)
    {
    	
    }
}
