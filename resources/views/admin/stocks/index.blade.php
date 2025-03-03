@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center text-success">[Solved using SQL Join]</h3>
                </div>
                <div class="card-header">
                    <h3 class="card-title">Product wise Stock List</h3>

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
                            <th>Product Name</th>
                            <th>Purchase Quantity</th>
                            <th>Purchase Return Quantity</th>
                            <th>Sale Quantity</th>
                            <th>Sale Return Quantity</th>
                            <th>Stock Quantity</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($products as $product)
                            <tr>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->total_purchased_quantity }}</td>
                                <td>{{ $product->total_purchase_returned_quantity }}</td>
                                <td>{{ $product->total_sold_quantity }}</td>
                                <td>{{ $product->total_sale_returned_quantity }}</td>
                                <td>{{ $product->stock_quantity }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No Products Found</td>
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
