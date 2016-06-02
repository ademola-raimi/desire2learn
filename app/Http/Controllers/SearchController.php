<?php

namespace Desire2Learn\Http\Controllers;

use Illuminate\Http\Request;
use Desire2Learn\Video;

class SearchController extends Controller
{
    /**
     * Perform a search query and return results
     * if any otherwise notify user No results.
     */
    public function getResults(Request $request)
    {
        //Get what user has typed in the search query
        $query = $request->input('query');

        $videoResults = Video::where('title', 'LIKE', '%' . $query . '%')->paginate(9);

        return view('layout.video.search', compact('videoResults', 'query'))
    }
}    