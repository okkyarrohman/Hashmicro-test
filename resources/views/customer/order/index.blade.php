@extends('layouts.customer')

@section('content')

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-dark text-white">
                        <h4 class="mb-0">🛒 Checkout Produk</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('order.store') }}" method="POST">
                            @csrf
                            <table class="table table-hover">
                                <thead class="table-dark">
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
                                            <td class="text-center">
                                                <input type="checkbox" name="product_ids[]" value="{{ $product->id }}"
                                                    class="form-check-input">
                                            </td>
                                            <td>{{ $product->name }}</td>
                                            <td><strong>Rp.{{ number_format($product->price) }}</strong></td>
                                            <td>
                                                <input type="number" name="quantities[{{ $product->id }}]" value="1" min="1"
                                                    max="{{ $product->stock }}" class="form-control w-50">
                                            </td>
                                            <td><span class="badge bg-info">{{ $product->stock }} tersedia</span></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="mt-4">
                                <label for="typepayment" class="form-label">💳 Pilih Metode Pembayaran:</label>
                                <select name="typePayment_id" id="typepayment" class="form-select">
                                    <option value="" disabled selected>Pilih metode pembayaran</option>
                                    @foreach ($typePayments as $payment)
                                        <option value="{{ $payment->id }}">{{ $payment->name }} ({{ $payment->code }})</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mt-4 d-flex justify-content-between">
                                <a href="{{ url('/customer/orders') }}" class="btn btn-outline-secondary">
                                    ⬅️ Kembali
                                </a>
                                <button type="submit" class="btn btn-success">
                                    🛍️ Checkout Sekarang
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <script>
            Swal.fire({
                title: "❌ Error!",
                html: "{!! implode('<br>', $errors->all()) !!}",
                icon: "error",
                confirmButtonText: "OK"
            });
        </script>
    @endif

@endsection
