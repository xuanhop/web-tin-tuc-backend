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
        $tags = Tag::getTagByLimit(15);
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
        $tag = Tag::specifiedTag($id)->first();
        if ($tag == null) {
           return redirect('tag/create');
        }
        return view('edit_tag')->with('tag', $tag);
    }

    /**
     * @param $id
     * @return RedirectResponse|Redirector
     */
    public function update($id)
    {
        Tag::updateTag($id);
        return redirect('tag');
    }

    /**
     * @return RedirectResponse|Redirector
     */
    public function store()
    {
        $tagName = request()->validate([
            'tag_name' => 'required'
        ]);
        Tag::store($tagName);
        return redirect('tag');
    }
}
