<?php

namespace Desire2Learn\Http\Controllers;

use Auth;
use Alert;
use Desire2Learn\User;
use Desire2Learn\Category;
use Illuminate\Http\Request;
use Desire2Learn\Http\Requests;

class CategoryController extends Controller
{
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
        $category = Category::where('id', $id)->first();
        
        return view('dashboard.video.editcategory', compact('category'));
    }

    /**
     * This method is for editing of the apps
     *
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name'        => 'required|name|unique:videos,url,'.$request->id,
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
     * This method delete videos created 
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::where('id', $id)->delete();

        if ($category) {
            alert()->success('category deleted succesfully', 'success');

            return redirect()->route('dashboard.home'); 
        } else {
           alert()->error('Something went wrong', 'error');

            return redirect()->back();
        }
    }
}
