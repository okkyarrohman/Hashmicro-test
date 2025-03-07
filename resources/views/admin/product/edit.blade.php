@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-warning text-white">
                    <h4 class="mb-0"><i class="bi bi-pencil-square"></i> Edit Product</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('products.update', $product['product_id']) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label fw-bold">Product Name</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-box"></i></span>
                                <input type="text" name="name" class="form-control" value="{{ $product['name'] }}" required placeholder="Enter product name">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Price</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-currency-dollar"></i></span>
                                <input type="number" name="price" class="form-control" value="{{ $product['price'] }}" required placeholder="Enter product price">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Stock</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-boxes"></i></span>
                                <input type="number" name="stock" class="form-control" value="{{ $product['stock'] }}" required placeholder="Enter stock quantity">
                            </div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-warning"><i class="bi bi-save"></i> Update Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
