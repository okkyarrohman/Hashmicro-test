@extends('layouts.customer')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard Customer') }}</div>

                    <div class="card-body">
                        <form action="{{ route('order.store') }}" method="POST">
                            @csrf
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Pilih</th>
                                        <th>Nama Produk</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="product_ids[]" value="{{ $product->id }}">
                                            </td>
                                            <td>{{ $product->name }}</td>
                                            <td>${{ $product->price }}</td>
                                            <td>
                                                <input type="number" name="quantities[{{ $product->id }}]" value="1" min="1" class="form-control">
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-success">Checkout</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
