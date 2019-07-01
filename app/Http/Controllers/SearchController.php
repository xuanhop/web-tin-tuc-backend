<?php

namespace App\Http\Controllers;

use App\Posts;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request){
        dd($request->get('search'));
    }
}