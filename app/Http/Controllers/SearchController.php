<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
        $results = 'None found.';

        return view('day1.challenge1', ['searchTerm' => $searchTerm, 'results' => $results]);
    }
}
