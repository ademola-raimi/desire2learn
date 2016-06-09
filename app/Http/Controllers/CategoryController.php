<?php

namespace Desire2Learn\Http\Controllers;

use Auth;
use Alert;
use Validator;
use Desire2Learn\User;
use Desire2Learn\Video;
use Desire2Learn\Category;
use Illuminate\Http\Request;
use Desire2Learn\Http\Requests;

class CategoryController extends Controller
{
    /**
     * This method displays category form, only superadmin user can access this method as well as 
     * other methods in this class
     *
     * @return \Illuminate\Http\Response
     */
    public function createCategory()
    {
        return view('dashboard.category.uploadform');
    }

    /**
     * This method displays the video categories created by the user
     *
     * @param $id
     * 
     * @return \Illuminate\Http\Response
     */
    public function showVideoCategories($id)
    {
        $video      = Video::where('category', $id)->paginate(6);
        $categories = Category::all();

        return view('layout.video.categoryvideos', compact('video', 'categories'));
    }

    /**
     * This method displays the video categories created by the user
     *
     * @param $categoryId
     * 
     * @return \Illuminate\Http\Response
     */
    public function showAllVideos()
    {
        $video      = Video::paginate(9);
        $categories = Category::all();

        return view('layout.video.categoryvideos', compact('video', 'categories'));
    }

    /**
     * This method validates and posts the data of the new video category
     *
     * @param $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function postCategory(Request $request)
    {
    	$this->validate($request, [
            'name'        => 'required|unique:categories,name',
            'description' => 'required',
        ]);

        $categoryUpload = Category::create([
            'name'        => $request['name'],
            'user_id'     => auth()->user()->id,
            'description' => $request['description'],
        ]);

        if ($categoryUpload) {
            alert()->success('Category uploaded successfully', 'success');

            return redirect()->route('uploaded.categories');
    	}
    	else {
            alert()->success('Category upload failed', 'success');

            return redirect()->back();
    	}
    }
    
    /**
     * This method gets the category edit form of the video
     *
     * @param $id
     * 
     * @return \Illuminate\Http\Response
     */
    public function getCategoryEditForm($id)
    {
        $category = Auth::user()->categories->find($id);

        if (is_null($category)) {
            alert()->error('Oops! unauthorize because you are not the owner!');
            
            return redirect()->route('dashboard.home');  
        }

        if ($category) {
            return view('dashboard.category.editcategory', compact('category'));
        }   
    }

    /**
     * This method validates and posts the video category data 
     *
     * @param $id
     * @param $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name'        => 'required|unique:categories,name,'.$request->id,
            'description' => 'required',
        ]);

        $category = Category::where('id', $request->id)->update([
            'name'        => $request->name,
            'description' => $request->description,
        ]);
    
        if ($category) {
            alert()->success('category updated succesfully', 'success');

            return redirect()->route('dashboard.home'); 
        } else {
            alert()->error('Something went wrong', 'error');

            return redirect()->back();
        }
    }

     /**
     * This method deletes category created by the user, Only special user can access this method.
     * A superadmin cannot delete a category.
     *
     * @param $id 
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Auth::user()->categories->find($id);

        if (is_null($category)) {
            alert()->error('Oops! unauthorize because you are not the owner!');

            return redirect()->route('dashboard.home');
        }

        $categoryDelete = $category->delete();

        if ($categoryDelete) {
            alert()->success('category deleted succesfully', 'success');

            return redirect()->route('dashboard.home'); 
        } else {
            alert()->error('Something went wrong', 'error');

            return redirect()->route('dashboard.home');
        }
    }
}
