<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Categories;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.categories.index', [
            'categories' => Categories::all()
        ]);
    }

    public function create(News $news)
    {
        return view('admin.categories.create', [
            'news' => $news,
            'categories' => Categories::all()
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

    public function update(Request $request, News $news)
    {
        $request->flash();

        $url = null;

        if ($request->file('image')) {
            $path = Storage::putFile('public/img', $request->file('image'));
            $url = Storage::url($path);
        }

        $news->image = $url;
        $news->fill($request->all())->save();

        return redirect()->route('news.show', $news->id)->with('success', 'Новость изменена');
    }

    public function destroy(Categories $category)
    {
        $category->delete();
        return redirect()->route('admin.index')->with('success', 'Новость удалена');
    }

    public function edit(News $news)
    {
        return view('admin.categories.create', [
            'news' => $news,
            'categories' => Categories::all()
        ]);
    }
}
