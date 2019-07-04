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
        $validate = $request->validate([
            'category_name' => 'required'
        ]);
        $categoryName = $request->get('category_name');
        $description = $request->get('description');
        $status = $request->get('status');
        $parent_id = $request->get('parent_category');
        $arr = session('user');
        $category = new Category();
        if ($parent_id != 0) {
            $category->name = $categoryName;
            $category->description = $description;
            $category->status = $status;
            $category->parent_id = $parent_id;
            $category->creator = $arr->id;

        } else {
            $category->name = $categoryName;
            $category->description = $description;
            $category->status = $status;
            $category->creator = $arr->id;
        }
        $category->save();
        return redirect('categories');
    }

    /**
     * @effect: soft delete category
     * @param $id
     * @return RedirectResponse|Redirector
     */
    public function delete($id)
    {
        Category::where('id', '=', $id)->update([
            'status' => -1,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        Category::where('parent_id', '=', $id)->update([
            'status' => -1,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
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
        $categoryName = $request->get('category_name');
        $description = $request->get('description');
        $status = $request->get('status');
        $parent_id = $request->get('parent_category');
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        Category::where('id', '=', $id)->update([
            'name' => $categoryName,
            'description' => $description,
            'status' => $status,
            'parent_id' => $parent_id,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        return redirect('categories');
    }

    public function categories(){
        $categories = \App\Category::where('status', '=', 1)->where('parent_id', 0)->with('child')->get();
        return view('categories', ['categories' => $categories]);
    }

    public function index(){
        $categories = App\Category::where('status', '=', 1)->get();
        return view('create_category', ['categories' => $categories]);
    }

    public function disable_item(){
        $disableCategories = \App\Category::where('status', '=', -1)->get();
        return view('disable-item', ['disableCategories' => $disableCategories]);
    }
}