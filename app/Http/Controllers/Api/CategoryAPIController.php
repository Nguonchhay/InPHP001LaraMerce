<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Resources\CategoryCollection;

class CategoryAPIController extends ApiController
{
    public function index()
    {
        $categories = Category::get();
        return $this->sendSuccess(
            new CategoryCollection($categories),
            'Category list'
        );
    }
}
