<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\News;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{
    public function index()
    {
        //$category = DB::table('categories')->get();
        //dd($category->keyBy('id'));

        return view('news.categories', [
            'categories' => Category::all()
        ]);
    }

    public function show($slug)
    {
//        $category = Category::query()->where('slug', $slug)->first();

       // $news = News::query()->where('category_id', $category->id)->get();

        $category = Category::query()->where('slug', $slug)->first();

        return view('news.category', [
            'category' => $category->title,
            'news' =>  $category->news
        ]);
    }
}
