<?php

namespace App\Http\Controllers;

use App\Posts;
use App\Relation;
use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    function index()
    {
        $tags = Tag::all();
        return view('tag_manage', ['tags' => $tags]);
    }

    function delete($id)
    {
        Tag::where('id', '=', $id)->delete();
        Relation::where('tag_id', $id)->delete();
        return redirect('tag');
    }

    function edit($id)
    {
        $tag = Tag::where('id', $id)->first();
        return view('edit_tag')->with('tag', $tag);
    }

    function update($id)
    {
        $count = Relation::where('id', $id)->select('post_id')->count();
        dd($count);
        $tagName = request('tag_name');
        Tag::where('id', $id)->update([
            'tag_name' => $tagName,
            'count' => $count
        ]);
        return redirect('tag');
    }

    public function store(){
        $validate = \request()->validate([
            'tag_name' => 'required'
        ]);
        Tag::insert([
            'tag_name' => \request('tag_name'),
        ]);
        return redirect('tag');
    }
}
