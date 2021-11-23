<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use function GuzzleHttp\Promise\all;

class NewsController extends Controller
{
    public function index()
    {
        return view('admin.index', [
            'news' => News::all()
        ]);
    }

    public function create(Request $request)
    {
        return view('admin.create', [
            'categories' => []
        ]);
    }

    public function store(Request $request, News $news)
    {
        $request->flash();

        $url = null;

        if ($request->file('image')) {
            $path = Storage::putFile('public/img', $request->file('image'));
            $url = Storage::url($path);
        }

        $news->image = $url;
        $news->fill($request->all())->save();

        return redirect()->route('news.show', $news->id)->with('success', 'Новость добавлена');
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('admin.index')->with('success', 'Новость удалена');
    }

    public function edit(News $news)
    {
        return view('admin.create', [
            'news' => $news,
            'categories' => []
        ]);
    }
}