<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {

        return view('admin.news', [
            'news' => News::paginate(7)
        ]);
    }

    public function create(News $news)
    {
        return view('admin.create', [
            'news' => $news,
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request, News $news)
    {
        $request->validate($news->rules(), [], $news->attributeNames());


       // $this->validate($request, $news->rules());

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

        $news->isPrivate = isset($request->isPrivate);

        $news->image = $url;
        $news->fill($request->all())->save();

        return redirect()->route('news.show', $news->id)->with('success', 'Новость изменена');
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('admin.news.index')->with('success', 'Новость удалена');
    }

    public function edit(News $news)
    {
        return view('admin.create', [
            'news' => $news,
            'categories' => Category::all()
        ]);
    }
}
