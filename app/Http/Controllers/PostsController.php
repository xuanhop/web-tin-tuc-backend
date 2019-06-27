<?php

namespace App\Http\Controllers;

use App\Category;
use App\Meta;
use App\Posts;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostsController extends Controller
{

    /**
     * @effect: Return view with a list of posts data
     */
    public function posts()
    {
        $data = Posts::all()->forPage(1, 15);
        return view('posts_management', ['posts' => $data]);
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required|max:255|min:5'
        ]);
        dd($_FILES);


        $post = new Posts();
        $post->title = $request->title;
        $post->status = $request->status;
        $post->category_id = $request->category;
        $post->main_image = $request->main_image;
        $post->save();

        $meta = new Meta();
        $meta->data = $request->content_text;
        $meta->post_id = $post->id;
        $meta->save();
        return redirect('posts');
    }

    /**
     * Update post status to -1
     * @param $id
     *
     * @return RedirectResponse|Redirector
     */
    public function softDelete($id)
    {
        $post = Posts::find($id);
        $post->status = -1;
        $post->save();
        return redirect('posts');
    }

    /**
     * @effect: Return view edit with data
     * @param $id
     * @return Factory|View
     */
    public function edit($id)
    {
        $post = Posts::find($id);
        return view('layouts.create', ['post' => $post]);
    }

    public function update(Request $request)
    {

    }
}