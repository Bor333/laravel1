<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\News;
use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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

            $data = $news->getNews();

            $data[] = $arr;

            $id = array_key_last($data);

            $data[$id]['id'] = $id;
            $data[$id]['isPrivate'] = isset($arr['isPrivate']);

            File::put(storage_path() . '/news.json', json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

            return redirect()->route('news.show', $id)->with('success');
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
    }
}
