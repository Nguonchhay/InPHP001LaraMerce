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
                                <!-- <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr> -->
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection