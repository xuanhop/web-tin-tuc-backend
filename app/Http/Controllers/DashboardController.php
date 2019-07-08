<?php

namespace App\Http\Controllers;

use App\Category;
use App\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $postNumber = Posts::all()->count();
        $categoriesNumber = Category::all()->count();
        $userNumber = DB::table('guests')->count();
        return view('index',
            ['postNumber' => $postNumber, 'categoriesNumber' => $categoriesNumber, 'userNumber' => $userNumber]);
    }
}
