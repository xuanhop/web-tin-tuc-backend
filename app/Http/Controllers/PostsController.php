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

    /**
     * @effect: Return view with a list of posts data
     */
    public function posts()
    {
        $data = \App\Posts::where('status', '=', 1)->paginate(15);
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
        foreach ($request->tag as $tag_id) {
            Relation::insert([
                'post_id' => $id,
                'tag_id' => $tag_id
            ]);
        }
        //Upload file to server
        $target_dir = public_path() . '\uploads\\';
        $target_file = $target_dir . basename($_FILES['main_image']['name']);

        if (isset($_POST["submit"])) {
            if (!file_exists($target_file)) {
                move_uploaded_file($_FILES["main_image"]["tmp_name"], $target_file);
            }
        }

        $meta = new Meta();
        $meta->data = $request->content_text;
        $meta->post_id = $id;
        $meta->save();

        return redirect('posts');
    }

    /**
     * Update post to status
     * @return RedirectResponse
     */
    public function delete()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $id = request()->post('id', '');
        $status = request()->post('status', '');
        Posts::where('id', $id)->update([
            'status' => $status,
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        return \redirect('posts');
        //return response()->json(['id' => $id , 'status' => $status]);
    }

    /**
     * @effect: Return view edit with data
     * @param $id
     * @return Factory|View
     */
    public function edit($id)
    {
        $post = Posts::where('id',$id)->with('meta')->first();

        return view('layouts.create', ['post' => $post]);
    }

    /**
     * @effect: Update data from form request
     * @param Request $request
     * @param $id
     * @return RedirectResponse|Redirector
     */
    public function update(Request $request, $id)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        Posts::where('id', $id)->update([
            'title' => $request->title,
            'status' => $request->status,
            'category_id' => $request->category,
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        if ($request->main_image !== null) {
            Posts::where('id', $id)->update(['main_image' => $_FILES['main_image']['name']]);
            $target_dir = public_path() . '\uploads\\';
            $target_file = $target_dir . basename($_FILES['main_image']['name']);
            if (isset($_POST["submit"])) {
                if (!file_exists($target_file)) {
                    move_uploaded_file($_FILES["main_image"]["tmp_name"], $target_file);
                }
            }
        }
        Meta::where('post_id', $id)->update([
            'data' => $request->content_text
        ]);

        return redirect('posts');
    }

    public function index()
    {
        $categories = \App\Category::paginate(15);
        return view('layouts.create', ['categories' => $categories]);
    }

    public function inactivePosts()
    {
        $posts = \App\Posts::where('status', '=', -1)->paginate(15);
        return view('layouts.inactive', ['posts' => $posts]);
    }
}