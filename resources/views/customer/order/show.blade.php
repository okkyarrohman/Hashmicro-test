@extends('layouts.customer')

@section('content')


        <div class="container">
            <h2>Detail Order #{{ $order->id }}</h2>

            <h3>Produk yang Dibeli:</h3>
            <table class="table">
                <thead>
                    <tr>
                    <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orderDetails as $detail)
                        <tr>
                            <td>{{ $detail->product_name }}</td> {{-- Perbaikan: gunakan alias dari query --}}
                            <td>Rp.{{ number_format($detail->price) }}</td>
                            <td>{{ $detail->quantity }}</td>
                            <td>Rp. {{ number_format($detail->price * $detail->quantity) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <p><strong>Status:</strong> {{ $order->status }}</p>
            <p><strong>Price:</strong>Rp. {{ number_format($order->total_price) }}</p>
            <p><strong>Tax:</strong> Rp. {{ number_format($order->tax) }}</p>
            <p><strong>Total Price:</strong> Rp{{ number_format($order->total_price + $order->tax)}}</p>

        </div>

         @if(session('success'))
        <script>
            Swal.fire({
                title: "Berhasil!",
                text: "{{ session('success') }}",
                icon: "success",
                confirmButtonText: "OK"
            });
        </script>
    @endif
@endsection
