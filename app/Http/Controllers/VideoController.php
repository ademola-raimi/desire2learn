<?php

namespace Desire2Learn\Http\Controllers;

use Desire2Learn\Video;
use Desire2Learn\Category;
use Illuminate\Http\Request;
use Desire2Learn\Http\Requests;

class VideoController extends Controller
{
    public function createVideo()
    {
    	$categories = Category::all();
    	return view('dashboard.video.uploadform', compact('categories'));
    }

    public function postVideo(Request $request)
    {
    	$this->validate($request, [
            'title'       => 'required',
            'url'         => 'required|url',
            'category'    => 'required',
            'description' => 'required',
        ]);

        $videoUpload = Video::create([
            'title'       => $request['title'],
            'url'         => $request['url'],
            'category'    => $request['category'],
            'description' => $request['description'],
        ]);

        if ($videoUpload) {
        	return redirect()->route('dashboard.index')->withInfo('Video uploaded successfully');
    	}
    	else {
    		return redirect()->back()->withInfo('Video upload failed');
    	}
    }
}
