<?php

namespace Desire2Learn\Http\Controllers;

use Illuminate\Http\Request;
use Desire2Learn\Category;
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
            'name'       => 'required|unique:categories,name',
            'icon'         => 'required|unique:categories,icon',
        ]);

        $categoryUpload = Category::create([
            'name'       => $request['name'],
            'icon'         => $request['icon'],
        ]);

        if ($categoryUpload) {
            alert()->success('Category uploaded successfully', 'success');

        	return redirect()->route('dashboard.index');
    	}
    	else {
            alert()->success('Category upload failed', 'success');
            
    		return redirect()->back();
    	}
    }
}
