<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * @effects: get data from request and insert into database
     * @param Request $request id
     * @return RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        Category::store($request);
        return redirect('categories');
    }

    /**
     * @effect: soft delete category
     * @param $id
     * @return RedirectResponse|Redirector
     */
    public function delete($id)
    {
        Category::softDelete($id);
        return redirect('categories');
    }

    /**
     * @effect: get data from request and update into database
     * @param $id
     * @return Factory|View
     */
    public function edit($id)
    {
        $category = Category::where('id', '=', $id)->first();
        $categories = Category::where('status', '=', 1)->get();
        return view('edit_category', ['category' => $category, 'categories' => $categories]);
    }

    /**
     * @effect: get data from request and update category where category_id = id
     * @param Request $request
     * @param $id
     */
    public function update(Request $request, $id)
    {
        Category::updateCategory($request, $id);
        return redirect('categories');
    }

    public function categories(){
        $categories = \App\Category::where('status', '=', 1)->where('parent_id', 0)->with('child')->get();
        return view('categories', ['categories' => $categories]);
    }

    public function index(){
        $categories = \App\Category::where('status', '=', 1)->get();
        return view('create_category', ['categories' => $categories]);
    }

    /**
     * @return Factory|View
     */
    public function disable_item(){
        $disableCategories = \App\Category::where('status', '=', -1)->get();
        return view('disable-item', ['disableCategories' => $disableCategories]);
    }
}