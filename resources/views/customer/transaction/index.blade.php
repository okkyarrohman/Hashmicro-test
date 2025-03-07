@extends('layouts.customer')

@section('content')
    <div class="container">
        <h2>Transactions</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Order Id</th>
                    <th>Customer Name</th>
                    <th>Products</th>
                    <th>Total Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction['orderId'] }}</td>
                        <td>{{ $transaction['customerName'] }}</td>
                        <td>
                            <ul>
                                @foreach($transaction['products'] as $product)
                                    <li>{{ $product }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>{{ "Rp. " . number_format($transaction['totalPrice']) }}</td>
                        <td>
                            <a href="{{ url('/customer/orders/' . $transaction['orderId']) }}" class="btn btn-info btn-sm">
                                Invoice
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
