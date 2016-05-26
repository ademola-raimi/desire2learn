<?php

namespace Desire2Learn\Http\Controllers;

use Auth;
use Alert;
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
            'user_id'      => auth()->user()->id,
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

    public function getAllVideos()
    {
        $videos = $this->videoRepository->getAllVideos();

        return view('layout.video.videos', compact('videos'));
    }

    public function showVideo($id)
    {
        $video = Video::find($id);
        $latestComments = $video->comments()->latest()->take(10)->get();

        return view('layout.video.show-video', compact('video', 'latestComments'));
    }

    /**
     * This method is for editing of the apps
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = video::where('id', $id)->first();
        $categories = Category::all();
        
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
        //dd($videos);
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
        $appDetails = AppDetail::where('id', $id)->delete();

        if ($appDetails) {
            alert()->success('Video deleted succesfully', 'success');

            return redirect()->route('dashboard.home'); 
        } else {
           alert()->error('Something went wrong', 'error');

            return redirect()->back();
        }
    }
}
