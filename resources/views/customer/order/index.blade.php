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
                                            <th>Stock</th>
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
                                                <td>{{ $product->stock }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
    <div class="section typepayment">
        <label for="typepayment">Pilih Metode Pembayaran:</label>
        <select name="typePayment_id" id="typepayment" class="form-control">
            <option value="" disabled selected>Pilih metode pembayaran</option>
            @foreach ($typePayments as $payment)
                <option value="{{ $payment->id }}">{{ $payment->name }} ({{ $payment->code }})</option>
            @endforeach
        </select>
    </div>


                                <button type="submit" class="btn btn-success">Checkout</button>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if ($errors->any())
            <script>
                Swal.fire({
                    title: "Error!",
                    html: "{!! implode('<br>', $errors->all()) !!}",
                    icon: "error",
                    confirmButtonText: "OK"
                });
            </script>
        @endif
@endsection
