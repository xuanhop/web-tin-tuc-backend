<?php

namespace App\Http\Controllers;

use App\Category;
use App\Meta;
use App\Posts;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->search;
        $meta_data = Meta::where('data', 'LIKE', '%' . $search . '%')->get();
        $posts = array();
        foreach ($meta_data as $data) {
            $post = Posts::where('id', '=', $data->post_id)->get();
            array_push($posts, $post);
        }
        $categories = Category::where('name', 'LIKE', '%' . $search . '%')->orwhere('description', 'LIKE',
            '%' . $search . '%')->get();
        return view('search', ['posts' => $posts]);
    }
}