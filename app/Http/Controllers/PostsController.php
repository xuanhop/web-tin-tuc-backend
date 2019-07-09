<?php

namespace App\Http\Controllers;

use App\Category;
use App\Meta;
use App\Posts;
use App\Relation;
use App\Tag;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class PostsController extends Controller
{

    public function posts()
    {
        $data = Posts::posts();
        return \view('posts_management')->with('posts', $data);
    }

    public function store(Request $request)
    {
        $validatedData =$request->validate([
            'title' => 'required|max:255|min:5',
            'main_image' => 'require|filled|image'
        ]);
        Posts::insert();
        return \redirect('posts');
    }

    /**
     * Update status post
     * @return void
     */
    public function delete()
    {
        Posts::deletePost();
    }

    /**
     * @effect: Return view edit with data
     * @param $id
     * @return Factory|View
     */
    public function edit($id)
    {
        $post = Posts::edit($id);
        $categories = Category::all();
        return view('layouts.create', ['post' => $post, 'categories' => $categories]);
    }

    /**
     * @effect: Update data from form request
     * @param Request $request
     * @param $id
     * @return RedirectResponse|Redirector
     */
    public function update(Request $request, $id)
    {
        Posts::updatePost($id);
        return redirect('posts');
    }

    /**
     * @effect: get category and send to view create
     * @return Factory|View
     */
    public function index()
    {
        $categories = \App\Category::all();
        return view('layouts.create', ['categories' => $categories]);
    }

    /**
     * @effect: List all 15 inactive posts per page
     * @return Factory|View
     */
    public function inactivePosts()
    {
        $posts = Posts::inactivePost();
        return view('layouts.inactive', ['posts' => $posts]);
    }
}