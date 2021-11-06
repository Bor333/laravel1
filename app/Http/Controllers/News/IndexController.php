<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(News $news)
    {
        return view('news.index')->with('news', $news->getNews());
    }

    public function show(News $news, $id)
    {
        return view('news.one')->with('news', $news->getNewsById($id));
    }

}
