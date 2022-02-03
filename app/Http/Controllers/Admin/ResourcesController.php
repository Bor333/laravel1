<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

use App\Models\Resources;
use Illuminate\Http\Request;

class ResourcesController extends Controller
{
    public function index()
    {
        return view('admin.resources', [
            'resources' => Resources::all()
        ]);
    }

    public function destroy(Resources $resource)
    {
        $resource->delete();
        return redirect()->route('admin.resources.index')->with('success', 'Ресурс удален');

    }

    public function create()
    {
        return view('admin.resource_create');
    }


    public function store(Request $request, Resources $resource)
    {
        $resource->rssLink = filter_var($request->link, FILTER_VALIDATE_URL);


        if ($resource->rssLink && !Resources::where('rssLink', $resource->rssLink)->first()) {
            $request->flash();

            $resource->fill($request->all())->save();

            return redirect()->route('admin.resources.index')->with('success', 'Ресурс добавлен');
        } else if (!$resource->rssLink) {
            return redirect()->route('admin.resources.index')->with('error', 'Неверный тип ресурса');
        } else {
            return redirect()->route('admin.resources.index')->with('error', 'Такой ресурс уже есть');
        }
    }
}
