@extends('admin.layout.template')
@section('page_title')
    Dashboard - Home-Services
@endsection
@section('content')
    <!-- Bootstrap Table with Header - Light -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> All Category</h4>
        <div class="card">
            <h5 class="card-header" style="margin-bottom: -40px">Available Category Infromation</h5>
            <div class="row ">
                <div class="col-11 text-end my-2">
                    <a href="{{ route('addcategory') }}" class="btn btn-primary">Add Category</a>
                </div>

            </div>
            <!--       message       -->
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <!--       message       -->
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>Id</th>
                            <th>Category Name</th>
                            <th>Image</th>
                            <th>Slug</th>
                            <th>Services Count</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($categories as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->category_name }}</td>

                                <td> <img style="height: 50px" src="{{ asset($item->categroy_image) }}" alt="">
                                </td>
                                <td>{{ $item->slug }}</td>
                                <td>0</td>
                                <td>
                                    <a href="" class="btn btn-primary">Edit</a>
                                    <a href=""class="btn btn-warning">Delete</a>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
        <!-- Bootstrap Table with Header - Light -->
    </div>
@endsection
