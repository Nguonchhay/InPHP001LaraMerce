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

    public function store(Request $request)
    {
        $category = new Category();
        $category->title = $request->get('title');
        $category->highted = $request->has('highted') ? 1 : 0;
        $category->save();

        return redirect(route('backend.categories.index'));
    }

    public function show()
    {

    }

    public function edit(Category $category)
    {
        return view('backend.categories.edit', [
            'category' => $category
        ]);
    }

    public function update(Category $category, Request $request)
    {
        $category->title = $request->get('title');
        $category->highted = $request->has('highted') ? 1 : 0;
        $category->save();
        return redirect(route('backend.categories.index'));
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect(route('backend.categories.index'));
    }
}
