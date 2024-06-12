@extends('layouts.app')

@section('content')
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Categories</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active text-white">Categories</li>
        </ol>
    </div>
    <!-- Single Page Header End -->

    <div class="container-fluid featurs py-5">
            <div class="container py-5">
                <div class="row g-4">
                    <div class="col-md-3">
                        <h2>Menu</h2>
                    </div>
                    <div class="col-md-9">
                        <h2>Category list</h2>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Show in Home?</th>
                                    <th scope="col">
                                        <a href="{{ route('backend.categories.create') }}" class="btn btn-primary">+ New</a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($categories->isEmpty())
                                    <tr>
                                        <td colspan="4">There is no record.</td>
                                    </tr>
                                @else
                                    @foreach($categories as $category)
                                        <tr>
                                            <th scope="row">{{ $category->id }}</th>
                                            <td>{{ $category->title }}</td>
                                            <td>
                                                {{ $category->highted ? 'YES' : 'NO' }}
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="">
                                                    <a href="{{ route('backend.categories.edit', $category->id) }}" class="btn btn-default">Edit</a>
                                                    <button onclick="deleteCategory({{ $category->id }})" type="button" class="btn btn-danger">Delete</button>
                                                    <form id="frmDeleteCategory{{ $category->id }}" action="{{ route('backend.categories.destroy', $category->id) }}" method="POST">
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
                            function deleteCategory(selectedId) {
                                if (confirm('Are you sure?')) {
                                    document.getElementById('frmDeleteCategory' + selectedId).submit();
                                }
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
@endsection