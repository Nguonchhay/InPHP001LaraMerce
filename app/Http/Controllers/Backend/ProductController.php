<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $pagination = config('settings.product_pagination');
        if ($request->user()->role === ROLE_ADMIN) {
            $products = Product::paginate($pagination);
        } else {
            $products = Product::where('owner_id', Auth::id())->paginate($pagination);
        }
        
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
        $productData['owner_id'] = Auth::id();
        Product::create($productData);
        return redirect()->route('backend.products.index');
    }

    public function show(Product $product, Request $request)
    {
        if ($request->user()->cannot('showProduct', $product)) {
            abort(403);
        }
        return view('backend.products.show', [
            'product' => $product
        ]);
    }

    public function edit(Product $product)
    {
        Gate::authorize('updateProduct', $product);

        $categories = Category::pluck('title', 'id');
        return view('backend.products.edit', [
            'product' => $product,
            'categories' => $categories
        ]);
    }

    public function update(Product $product, Request $request)
    {
        if (! Gate::allows('updateProduct', $product)) {
            abort(403);
        }

        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'unit_price' => 'required',
            'qty_in_stock' => 'required'
        ]);

        $product->category_id = $request->get('category_id');
        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->unit_price = $request->get('unit_price');
        $product->qty_in_stock = intval($request->get('qty_in_stock'));

        if ($request->image) {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,gif|max:2048'
            ]);
            $imagePathAndFileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('upload_images'), $imagePathAndFileName);

            $product->image_url = 'upload_images/' . $imagePathAndFileName;
        }

        $product->save();
        // Remove old image if we updated

        return redirect()->route('backend.products.index');
    }

    public function destroy(Product $product)
    {
        Gate::authorize('deleteProduct', $product);
        $product->delete();
        // Add logic to remove file from server
        return redirect()->route('backend.products.index');
    }

    public function forceDestroy(Product $product)
    {
        return redirect()->route('backend.products.index');
    }
}
