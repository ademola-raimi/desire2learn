<?php

namespace Desire2Learn\Http\Controllers;

use Auth;
use Alert;
use Desire2Learn\User;
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

    public function getAdminForm()
    {
        return view('dashboard.superadminform');
    }

    public function createAdmin(Request $request)
    {
        $this->validate($request, [
            'email'    => 'required',
        ]);

        $user = User::where('email', $request['email'])->first();

        if (is_null($user)) {
            alert()->error('Invalid Email');

            return redirect()->back();
        }

        alert()->success('Successfully created a superadmin user');

        $user->increment('role_id');

        return redirect()->route('dashboard.home');
    }
}
