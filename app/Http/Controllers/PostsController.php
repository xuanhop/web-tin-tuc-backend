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
        $data = Posts::getPostWithStatus(1, 15);
        return \view('posts_management')->with('posts', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255|min:5',
            'main_image' => 'required|filled|image',
        ]);
        $title = $request->title;
        $status = $request->status;
        $category = $request->category;
        $data = $request->content_text;
        Posts::insert($title, $status, $category, $data);
        return redirect('posts');
    }

    /**
     * Update status post
     * @return void
     */
    public function delete(Request $request)
    {
        $id = $request->post('id', '');
        $status = $request->post('status', '');
        Posts::deletePost($id, $status);
        return redirect('posts');
    }

    /**
     * @effect: Return view edit with data
     * @param $id
     * @return Factory|View
     */
    public function edit($id)
    {
        $post = Posts::editPost($id);

        $categories = Category::index()->get();
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
        Posts::updatePost($id, $request->title, $request->status, $request->category, $request->main_image,
            $request->content_text);
        return redirect('posts');
    }

    /**
     * @effect: get category and send to view create
     * @return Factory|View
     */
    public function index()
    {
        $categories = Category::index()->get();
        return view('layouts.create', ['categories' => $categories]);
    }

    /**
     * @effect: List all 15 inactive posts per page
     * @return Factory|View
     */
    public function inactivePosts()
    {
        $posts = Posts::getPostWithStatus(-1, 15);
        return view('layouts.inactive', ['posts' => $posts]);
    }
}