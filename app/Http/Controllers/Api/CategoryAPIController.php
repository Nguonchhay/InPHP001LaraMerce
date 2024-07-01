<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Resources\CategoryCollection;

class CategoryAPIController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        return new CategoryCollection($categories);
    }
}