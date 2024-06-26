@extends('layouts.app')

@section('content')
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Products</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active text-white">Products</li>
        </ol>
    </div>
    <!-- Single Page Header End -->

    <div class="container-fluid featurs py-5">
            <div class="container py-5">
                <div class="row g-4">
                    <div class="col-md-3">
                        @include('includes.backend.menu')
                    </div>
                    <div class="col-md-9">
                        <h2>Show Product</h2>
                        <form method="POST" action="{{ route('backend.products.update', $product->id) }}" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="owner_id" class="form-label">Owner </label>
                                <input type="text" readonly class="form-control" required id="owner_id" name="owner_id" value="{{ $product->owner->name }}">
                            </div>
                            <div class="mb-3">
                                <label for="category_id" class="form-label">Category</label>
                                <input type="text" readonly class="form-control" required id="category_id" name="category_id" value="{{ $product->category->title }}">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Product Name </label>
                                <input type="text" readonly class="form-control" required id="name" name="name" value="{{ $product->name }}">
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Product Description *</label>
                                <textarea class="form-control" readonly required id="description" name="description">{{ $product->description }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="unit_price" class="form-label">Unit Price *</label>
                                <input type="text" readonly class="form-control" required id="unit_price" name="unit_price" value="{{ $product->unit_price }}">
                            </div>
                            <div class="mb-3">
                                <label for="qty_in_stock" class="form-label">Quantity In Stock</label>
                                <input type="number" readonly class="form-control" required id="qty_in_stock" name="qty_in_stock" value="{{ $product->qty_in_stock }}">
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Image *</label>
                                <img src="{{ asset($product->image_url) }}" class="w-50" alt="" />
                            </div>
                            <div class="mb-3">
                                <a href="{{ route('backend.products.index') }}" class="btn btn-default">Back to list</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection