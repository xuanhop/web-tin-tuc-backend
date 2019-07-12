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
        $request->validate([
            'category_name' => 'required'
        ]);
        $categoryName = $request->get('category_name');
        $description = $request->get('description');
        $status = $request->get('status');
        $parent_id = $request->get('parent_category');
        Category::store($categoryName, $description, $status, $parent_id);
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
        $category = Category::specify($id, 'id')->firstOrFail();
        if ($category == null){
            return redirect('categories/create');
        }
        $categories = Category::index()->get();
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
        $categories = Category::categories()->paginate(15);
        return view('categories', ['categories' => $categories]);
    }

    /**
     * @effect: Get all categories and pass to view create category
     * @return Factory|View
     */
    public function index(){
        $categories = Category::index()->get();
        return view('create_category', ['categories' => $categories]);
    }

    /**
     * @return Factory|View
     */
    public function disable_item(){
        $disableCategories = Category::disable()->paginate(15);
        return view('disable-item', ['disableCategories' => $disableCategories]);
    }
}