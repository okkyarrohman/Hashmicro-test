@php
    $layout = Auth::user()->hasRole('admin') ? 'layouts.admin' : 'layouts.customer';
@endphp
@extends($layout)




@section('content')

        <div class="container mt-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h2 class="text-center mb-4">📦 Order Details #{{ $order->id }}</h2>
                    <a href="{{ route('order.exportPdf', $order->id) }}" class="btn btn-danger mt-3">
                        📄 Export PDF
                    </a>

                    <div class="mb-3">
                        <strong>Status:</strong>
                        @php
$statusColor = [
    'PENDING' => 'warning',
    'PAID' => 'success',
    'EXPIRED' => 'danger'
];
                        @endphp
                        <span class="badge bg-{{ $statusColor[$order->status] ?? 'secondary' }}">
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>

                    <h3>🛍️ Produk yang Dibeli:</h3>
                    <table class="table table-hover">
                        <thead class="table-dark">
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
                                    <td>{{ $detail->product_name }}</td>
                                    <td>Rp.{{ number_format($detail->price) }}</td>
                                    <td>{{ $detail->quantity }}</td>
                                    <td><strong>Rp. {{ number_format($detail->price * $detail->quantity) }}</strong></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-3">
                        <p><strong>💰 Price:</strong> Rp. {{ number_format($order->total_price) }}</p>
                        <p><strong>🧾 Tax:</strong> Rp. {{ number_format($order->tax) }}</p>
                        <p class="fs-4"><strong>💳 Total Price:</strong> Rp.
                            {{ number_format($order->total_price + $order->tax) }}</p>
                    </div>

                    <a href="{{ url('/customer/orders') }}" class="btn btn-outline-secondary mt-3">
                        ⬅️ Kembali ke Daftar Transaksi
                    </a>
                </div>
            </div>
        </div>

        @if(session('success'))
            <script>
                Swal.fire({
                    title: "✅ Berhasil!",
                    text: "{{ session('success') }}",
                    icon: "success",
                    confirmButtonText: "OK"
                });
            </script>
        @endif

@endsection
