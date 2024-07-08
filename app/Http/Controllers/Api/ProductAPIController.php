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
        return $this->sendSuccess(
            new ProductCollection($products),
            'Product list'
        );
    }

    public function show(Product $product)
    {
        return $this->sendSuccess(
            [new ProductResource($product)],
            'Product detail'
        );
    }
}
