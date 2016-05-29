<?php

namespace Desire2Learn\Http\Controllers;

use Auth;
use Alert;
use Counter;
use Desire2Learn\Like;
use Desire2Learn\Video;
use Desire2Learn\Comment;
use Desire2Learn\Category;
use Illuminate\Http\Request;
use Desire2Learn\Http\Requests;
use Desire2Learn\Http\Repository\VideoRepository;

class VideoController extends Controller
{
    public function createVideo()
    {
    	$categories = Category::all();
    	return view('dashboard.video.uploadform', compact('categories'));
    }

    public function getYouTubeIdFromURL($url)
    {
      $urlString = parse_url($url, PHP_URL_QUERY);
      parse_str($urlString, $args);

      return $args['v']; 
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
            'user_id'     => auth()->user()->id,
            'url'         => $this->getYouTubeIdFromURL($request['url']),
            'category'    => $request['category'],
            'description' => $request['description'],
        ]);

        if (is_null($videoUpload->id)) {
            alert()->error('Video upload failed', 'error');

            return redirect()->back();
    	}

        alert()->success('Video uploaded successfully', 'success');

        return redirect()->route('dashboard.home');     
    }

    // public function getRelatedVideos($videos)
    // {
    //     $videos = Video::where('category', $video->category)->get();

    //     return $videos;
    // }

    public function showVideo($id)
    {
        $video = Video::find($id);

        $relatedVideos = Video::where('category', $video->category)->get();
        //$relatedVideo = $this->getRelatedVideos($videos);

        $counter = Counter::showAndCount('show-video', $video->id);
        if ($counter) {
            $video->increment('views');
        }

        $latestComments = $video->comments()->latest()->take(10)->get();

        return view('layout.video.show-video', compact('video', 'latestComments', 'relatedVideos'));
    }

    /**
     * This method is for editing of the apps
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = Auth::user()->videos->find($id);
        $categories = Category::all();

        if (is_null($video)) {
            alert()->error('Oops! unauthorize because you are not the owner!');
            return redirect()->route('dashboard.home');  
        }
        
        return view('dashboard.video.editvideo', compact('video', 'categories'));
    }

    /**
     * This method is for editing of the apps
     *
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
            'title'       => 'required',
            'url'         => 'required|url|unique:videos,url,'.$request->id,
            'category'    => 'required',
            'description' => 'required',
        ]);

        $videos = Video::where('id', $request->id)->update([
            'title'       => $request->title,
            'url'         => $this->getYouTubeIdFromURL($request['url']),
            'category'    => $request->category,
            'description' => $request->description,
        ]);
        
        if ($videos) {
            alert()->success('Video updated succesfully', 'success');

            return redirect()->route('dashboard.home'); 
        } else {
            alert()->error('Something went wrong', 'error');

            return redirect()->back();
        }
    }

     /**
     * This method delete videos created 
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Video::where('id', $id)->delete();

        if ($video) {
            alert()->success('Video deleted succesfully', 'success');

            return redirect()->route('dashboard.home'); 
        } else {
           alert()->error('Something went wrong', 'error');

            return redirect()->back();
        }
    }
}
