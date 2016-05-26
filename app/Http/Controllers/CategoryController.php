

<?php

namespace Desire2Learn\Http\Controllers;

use Auth;
use Image;
use Desire2Learn\User;
use Desire2Learn\Category;
use Illuminate\Http\Request;
use Desire2Learn\Http\Requests;

class CategoryController extends Controller
{
    private $pathToFile;

    public function __construct()
    {
        $this->pathToFile = '../public/images/categoryIcon';
    }

    public function createCategory()
    {
    	return view('dashboard.category.uploadform');
    }

    public function postCategory(Request $request)
    {
    	$this->validate($request, [
            'name' => 'required|unique:categories,name',
            'icon' => 'required',
        ]);

        $img = Image::make($request->file('icon')->getRealPath())
            ->resize(300, 200);
        $extension = $request->file('icon')->clientExtension();
        $img->filename = $request->get('name');
        $img->save($this->pathToFile .'/'. $img->filename . '.' .$extension);

        $categoryUpload = Category::create([
            'name'    => $request['name'],
            'user_id' => auth()->user()->id,
            'icon'    => '/images' .'/'. $img->filename . '.' .$extension,
        ]);

        if ($categoryUpload || $updateImgurl) {
            alert()->success('Category uploaded successfully', 'success');

        	return redirect()->route('dashboard.home');
    	}
    	else {
            alert()->success('Category upload failed', 'success');

    		return redirect()->back();
    	}
    }
}
