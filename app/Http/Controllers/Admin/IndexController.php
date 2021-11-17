<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
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

    public function create(Request $request, Categories $categories, News $news)
    {
        if ($request->isMethod('post')) {
            $request->flash();
            $arr = $request->except('_token');

            $url = null;

            if ($request->file('image')) {
                $path = Storage::putFile('public/img', $request->file('image'));
                $url = Storage::url($path);
            }

            DB::table('news')->insert([
                'title' => $request->get('title'),
                'text' => $request->get('text'),
                'isPrivate' => $request->has('isPrivate'),
                'image' => $url,
            ]);

            return redirect()->route('news.show', DB::table('news')->orderBy('id', 'desc')->first('id')->id)->with('success', 'Новость добавлена');
        }

        return view('admin.create', [
            'categories' => $categories->getCategories()
        ]);
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
