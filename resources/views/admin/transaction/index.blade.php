@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4 text-center">📜 Transaction History</h2>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card shadow-sm border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <input type="text" class="form-control w-25" id="searchBox" placeholder="🔍 Search Transactions">
                </div>

                <table class="table table-hover" id="transactionTable">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Order ID</th>
                            <th>Customer Name</th>
                            <th>Products</th>
                            <th>Total Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transactions as $index => $transaction)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td><span class="badge bg-primary">{{ $transaction['orderId'] }}</span></td>
                                <td>{{ $transaction['customerName'] }}</td>
                                <td>
                                    @foreach($transaction['products'] as $product)
                                        <span class="badge bg-success">{{ $product }}</span>
                                    @endforeach
                                </td>
                                <td class="text-end"><strong>{{ "Rp. " . number_format($transaction['totalPrice']) }}</strong>
                                </td>
                                <td>
                                    <a href="{{ url('/customer/orders/' . $transaction['orderId']) }}"
                                        class="btn btn-warning btn-sm">
                                        🧾 Invoice
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <nav>
                    <ul class="pagination justify-content-center mt-3">
                        <li class="page-item disabled">
                            <a class="page-link" href="#">«</a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">»</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <script>
        document.getElementById("searchBox").addEventListener("keyup", function () {
            let value = this.value.toLowerCase();
            let rows = document.querySelectorAll("#transactionTable tbody tr");

            rows.forEach(row => {
                row.style.display = row.innerText.toLowerCase().includes(value) ? "" : "none";
            });
        });
    </script>
@endsection
