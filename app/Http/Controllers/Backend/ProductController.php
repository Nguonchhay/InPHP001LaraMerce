<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(50);
        return view('backend.products.index', [
            'products' => $products
        ]);
    }

    public function create()
    {
        $categories = Category::pluck('title', 'id');
        return view('backend.products.create', [
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'unit_price' => 'required',
            'image' => 'required|image|mimes:jpeg,png,gif|max:2048'
        ]);

        $productData = $request->all();
        
        $imagePathAndFileName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('upload_images'), $imagePathAndFileName);

        $productData['image_url'] = 'upload_images/' . $imagePathAndFileName;
        Product::create($productData);
        return redirect()->route('backend.products.index');
    }

    public function show(Product $product)
    {
        return view('backend.products.show', [
            'product' => $product
        ]);
    }

    public function edit(Product $product)
    {
        return view('backend.products.edit', [
            'product' => $product
        ]);
    }

    public function update(Product $product, Request $request)
    {
        return redirect()->route('backend.products.index');
    }

    public function destroy(Product $product)
    {
        return redirect()->route('backend.products.index');
    }

    public function forceDestroy(Product $product)
    {
        return redirect()->route('backend.products.index');
    }
}
