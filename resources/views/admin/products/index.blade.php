@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center text-danger">[Solve using Eloquent ORM]</h3>
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif


                    <ul>
                        <li>List The Product</li>
                        <li>Store The Product</li>
                        <li>Update The Product</li>
                        <li>Delete The Product</li>
                    </ul>
                </div>
                <div class="input-group-append">
                            <a href="{{ route('admin.products.create') }}"><button class="btn btn-success">Add Product</button></a>
                            </div>
                <div class="card-header">
                    <h3 class="card-title">Product List</h3>
                    

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Purchase Price</th>
                            <th>Sale Price</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>
                                        <img src="{{ asset('/storage/products/' . $product->image) }}" alt="Product Image" width="50">
                                    </td>
                                    <td>${{ number_format($product->purchase_price, 2) }}</td>
                                    <td>${{ number_format($product->sale_price, 2) }}</td>
                                    <td class="d-flex">
                                        <a style="margin-right: 10px;"  href="{{ route('admin.products.edit', $product->id) }}"><button type="button" class="btn btn-block btn-info">Update</button></a>
                                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-block btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No Products Found</td>
                                    </tr>
                                @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
