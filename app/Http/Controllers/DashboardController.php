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
    /**
     * This method displays the dashboard index page of the user
     * displaying the number of reactions, uploaded videos and views the user has made
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$reactions      = Auth::user()->likes();
    	$uploadedVideos = Auth::user()->videos();
    	$views          = Auth::user()->views();

    	return view('dashboard.index', compact('reactions', 'uploadedVideos', 'views'));
    }

    /**
     * This method displays all the videos the user has uploaded in the application
     *
     * @return \Illuminate\Http\Response
     */
    public function uploadedVideos()
    {
    	$uploadedVideo = Auth::user()->videos()->paginate(3);

    	return view('dashboard.video.uploadedvideo', compact('uploadedVideo'));
    }

    /**
     * This method displays all the avalaible categories in the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAllCategories()
    {
    	$category = Category::all();

    	return view('dashboard.category.showcategories', compact('category'));
    }

    /**
     * This method displays the uploaded categories in the application
     *
     * @return \Illuminate\Http\Response
     */
    public function uploadedCategory()
    {
        $uploadedCategory = Auth::user()->categories()->paginate(9);

        return view('dashboard.category.uploadedcategories', compact('uploadedCategory'));
    }

    /**
     * This method displays the form to create a superadmin user, this form is only accessible
     * by a special user.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAdminForm()
    {
        return view('dashboard.superadminform');
    }

    /**
     * This method validates the email of the regular user provided and increment the 
     * role_id of the regular user to 2 in order to become an admin user
     *
     * @return \Illuminate\Http\Response
     */
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
