<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.categories', [
            'categories' => Category::all()
        ]);
    }

    public function create(Category $category)
    {
        return view('admin.category_create', [
            'category' => $category
        ]);
    }

    public function store(CategoryRequest $request, Category $category)
    {
        $request->validated();
        //   $request->validate($category->rules(), [], $category->attributeNames());

        // $this->validate($request, $category->rules());

        $category->fill($request->all())->save();

        return redirect()->route('admin.categories.index', $category->id)->with('success', 'Категория добавлена');
    }

    public function update(Request $request, Category $category)
    {
        $request->flash();


        $category->fill($request->all())->save();

        return redirect()->route('news.category.show', $category->slug)->with('success', 'Категория изменена');
    }

    public function destroy(Category $category)
    {
        if (!$category->news->first()) {
            $category->delete();
            return redirect()->route('admin.categories.index')->with('success', 'Категория удалена');
        } else {
            return redirect()->route('news.category.show', $category->slug)->with('error', 'Категория не пуста!');
        }
    }

    public function edit(Category $category)
    {
        return view('admin.category_create', [
            'category' => $category
        ]);
    }
}
