<?php

namespace App\Http\Controllers;

use App\Posts;
use App\Relation;
use App\Tag;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class TagController extends Controller
{
    /**
     * @return Factory|View
     */
    public function index()
    {
        $tags = Tag::with('relation')->paginate(15);
//        foreach ($tags as $tag) {
//            $count = Relation::select('post_id')->where('tag_id', $tag->id)->count();
//            Tag::where('id', $tag->id)->update([
//                'count' => $count
//            ]);
//        }
        return view('tag_manage', ['tags' => $tags]);
    }

    /**
     * @param $id
     * @return RedirectResponse|Redirector
     */
    public function delete($id)
    {
        Tag::where('id', '=', $id)->delete();
        Relation::where('tag_id', $id)->delete();
        return redirect('tag');
    }

    /**
     * @param $id
     * @return Factory|View
     */
    public function edit($id)
    {
        $tag = Tag::where('id', $id)->first();
        return view('edit_tag')->with('tag', $tag);
    }

    /**
     * @param $id
     * @return RedirectResponse|Redirector
     */
    function update($id)
    {
        $count = Relation::where('id', $id)->select('post_id')->count();
        $tagName = request('tag_name');
        Tag::where('id', $id)->update([
            'tag_name' => $tagName,
            'count' => $count
        ]);
        return redirect('tag');
    }

    /**
     * @return RedirectResponse|Redirector
     */
    public function store()
    {
        $validate = \request()->validate([
            'tag_name' => 'required'
        ]);
        Tag::insert([
            'tag_name' => \request('tag_name'),
        ]);
        return redirect('tag');
    }
}
