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
        //$news = DB::table('news')->get();

        //$news = News::all();
        //$news = News::simplePaginate(5);
        $news = News::paginate(5);

        return view('news.index')->with('news', $news);
    }

    public function show($id)
    {
        /*
        $news = DB::table('news')->find($id);
        $news->title = 'aaa';
        $news->save();
        $news->delete();
        */
        $news = News::find($id);

        return view('news.one')->with('news', $news);
    }

}
