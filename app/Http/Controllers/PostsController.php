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
        $data = \App\Posts::paginate(15);
        return view('posts_management', ['posts' => $data]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255|min:5',
            'main_image' => 'filled|image'
        ]);

        $post = new Posts();

        $id = $post->insertGetId([
            'title' => $request->title,
            'status' => $request->status,
            'main_image' => $_FILES['main_image']['name'],
            'category_id' => $request->category
        ]);

        //Upload file to server
        $target_dir = public_path().'\uploads\\';
        $target_file = $target_dir.basename($_FILES['main_image']['name']);

        if(isset($_POST["submit"])) {
            if (!file_exists($target_file)){
                if (move_uploaded_file($_FILES["main_image"]["tmp_name"], $target_file)){
                    dd("successful");
                }
            }
        }

        $meta = new Meta();
        $meta->data = $request->content_text;
        $meta->post_id = $id;
        $meta->save();

        return redirect('posts');
    }

    /**
     * Update post status to -1
     * @param $id
     *
     * @return RedirectResponse|Redirector
     */
    public function save($id, $status)
    {
        dd($status);
        return redirect('posts');
    }

    public function delete(){
        $id = request()->post('id', '');
        $status = request()->post('status', '');

        return response()->json(['id' => $id , 'status' => $status]);
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