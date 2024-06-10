<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        return view('backend.categories.index', [
            'pageTitle' => 'Category list',
            'categories' => $categories
        ]);
    }

    public function create()
    {
        return view('backend.categories.create', [
            'pageTitle' => 'New Category'
        ]);
    }

    public function store()
    {

    }

    public function show()
    {

    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
