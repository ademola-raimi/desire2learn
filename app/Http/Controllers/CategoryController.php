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
    public function showSingleCategory($id)
    {
        $category = Category::find($id);

        if (is_null($category)) {
            alert()->error('Oops! The category is not available!');

            return redirect()->route('dashboard.home');
        }

        return view('dashboard.category.showsinglecategory', compact('category'));
    }

    public function showVideoCategory($categoryId)
    {
        $video = Video::where('category', $categoryId)->paginate(6);
        $categories = Category::all();

        return view('layout.home', compact('video', 'categories'));
    }

    public function createCategory()
    {
    	return view('dashboard.category.uploadform');
    }

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

        	return redirect()->route('dashboard.home');
    	}
    	else {
            alert()->success('Category upload failed', 'success');

    		return redirect()->back();
    	}
    }
    
    /**
     * This method is for editing of the apps
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
     * This method is for editing of the apps
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
     * This method delete categorys created 
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
