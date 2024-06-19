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
                        <h2>Product list</h2>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">
                                        <a href="{{ route('backend.products.create') }}" class="btn btn-primary">+ New</a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($products->isEmpty())
                                    <tr>
                                        <td colspan="8">There is no record.</td>
                                    </tr>
                                @else
                                    @foreach($products as $item)
                                        <tr>
                                            <th scope="row">{{ $item->id }}</th>
                                            <td>{{ $item->category->title }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>
                                                <img class="w-25" src="{{ asset($item->image_url) }}" alt="{{ $item->name }}"/>
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="">
                                                    <a href="{{ route('backend.products.show', $item->id) }}" class="btn btn-default">Show</a>
                                                    <a href="{{ route('backend.products.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                                                    <button onclick="deleteModelItem({{ $item->id }})" type="button" class="btn btn-danger">Delete</button>
                                                    <form id="frmModelDeletion{{ $item->id }}" action="{{ route('backend.products.destroy', $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        <script>
                            function deleteModelItem(selectedId) {
                                if (confirm('Are you sure?')) {
                                    document.getElementById('frmModelDeletion' + selectedId).submit();
                                }
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
@endsection