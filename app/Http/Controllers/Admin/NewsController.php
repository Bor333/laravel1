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
        ] );
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->flash();


            $url = null;

            if ($request->file('image')) {
                $path = Storage::putFile('public/img', $request->file('image'));
                $url = Storage::url($path);
            }

            $news = new News();
            $news->image = $url;
            $news->fill($request->all())->save();

            return redirect()->route('news.show', $news->id)->with('success', 'Новость добавлена');
        }

        return view('admin.create', [
            'categories' => []
        ]);

    }
}
