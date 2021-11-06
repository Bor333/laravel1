<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use Faker\Factory;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {
        return view('category.index');
    }

    public function politics() {
        return view('category.politics');
    }

    public function sport() {
        return view('category.sport');
    }
}
