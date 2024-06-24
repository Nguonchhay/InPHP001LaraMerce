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
                        <h2>Edit Product</h2>
                        <form method="POST" action="{{ route('backend.products.update', $product->id) }}" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            @include('backend.products.includes.fields', [
                                'product' => $product
                            ])
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