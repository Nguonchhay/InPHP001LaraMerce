<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;

class ProductAPIController extends ApiController
{
    public function index()
    {
        $products = Product::get();
        return new ProductCollection($products);
    }

    public function show(Product $product)
    {
        return new ProductResource($product);
    }
}
