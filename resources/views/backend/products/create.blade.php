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
                        <h2>New Product</h2>
                        <form method="POST" action="{{ route('backend.products.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="category_id" class="form-label">Category *</label>
                                <select class="form-control" required id="category_id" name="category_id">
                                    <option value="" selected>Please select Category</option>
                                    @foreach($categories as $id => $title)
                                        <option value="{{ $id }}">{{ $title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Product Name *</label>
                                <input type="text" class="form-control" required id="name" name="name">
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Product Description *</label>
                                <textarea class="form-control" required id="description" name="description"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="unit_price" class="form-label">Unit Price *</label>
                                <input type="text" class="form-control" required id="unit_price" name="unit_price">
                            </div>
                            <div class="mb-3">
                                <label for="qtn_in_stock" class="form-label">Quantity In Stock</label>
                                <input type="number" class="form-control" required id="qtn_in_stock" name="qtn_in_stock" value="0">
                            </div>
                            <div class="mb-3">
                                <label for="image_url" class="form-label">Image *</label>
                                <input type="file" class="form-control" required id="image_url" name="image_url">
                            </div>
                            <div class="mb-3">
                                <a href="{{ route('backend.products.index') }}" class="btn btn-default">Back to list</a>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection