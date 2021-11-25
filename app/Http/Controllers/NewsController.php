<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::paginate(5);

        return view('news.index')->with('news', $news);
    }

    public function show($id)
    {
        $news = News::find($id);

        return view('news.one')->with('news', $news);
    }

}
