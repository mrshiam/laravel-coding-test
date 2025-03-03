<form action="{{ isset($product) ? route('admin.products.update', $product->id) : route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($product))
        @method('PUT')
    @endif

    <div class="card-body">
        <div class="form-group">
            <label for="productName">Product Name</label>
            <input type="text" class="form-control" id="productName" name="name" placeholder="Enter Product Name" value="{{ $product->name ?? old('name') }}">
        </div>
        
        <div class="form-group">
            <label for="purchasePrice">Purchase Price</label>
            <input type="text" class="form-control" id="purchasePrice" name="purchase_price" placeholder="Enter Purchase Price" value="{{ $product->purchase_price ?? old('purchase_price') }}">
        </div>
        
        <div class="form-group">
            <label for="salesPrice">Sales Price</label>
            <input type="text" class="form-control" id="salesPrice" name="sale_price" placeholder="Enter Sales Price" value="{{ $product->sale_price ?? old('sale_price') }}">
        </div>
        
        <div class="form-group">
            <label for="exampleInputFile">Product Image</label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                </div>
                
            </div>
            @isset($product)
                <img src="{{ asset('storage/products/' . $product->image) }}" width="100" class="mt-2" />
            @endisset
        </div>
    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">{{ isset($product) ? 'Update Product' : 'Add Product' }}</button>
    </div>
</form>