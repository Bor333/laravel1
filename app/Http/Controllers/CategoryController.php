<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index(Categories $categories)
    {
        $categories = DB::table('categories')->get();
        return view('news.categories')->with('categories', $categories);
    }

    public function show(News $news, Categories $categories, $slug)
    {
        $category = DB::table('categories')->find($slug);
        return view('news.category')->with('category',$category);
    }
}
