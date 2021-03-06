<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function send(Request $request)
    {

        return response()->json([
            'id' => $request->id,
            'status' => 'ok'
        ]);
    }

    public function ajax() {
        return view('admin.ajax');
    }

    public function test1(News $news)
    {
        return response()->json($news->getNews())
            ->header('Content-Disposition', 'attachment; filename = "json.txt"')
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    public function test2()
    {
        //return response()->download('cat.jpg');
        return response()->download('storage/img/default.jpeg');
    }
}
