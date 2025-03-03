@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Product</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                @include('admin.products.product-form', ['product' => $product]);
            
            </div>
                <!-- /.card -->
        </div>
    </div>
@endsection
