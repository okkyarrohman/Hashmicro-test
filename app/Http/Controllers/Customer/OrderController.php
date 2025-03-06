<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $products = Product::all();


        return view('customer.order.index', compact('products'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'product_ids' => 'required|array',
            'product_ids.*' => 'exists:products,id',
            'quantities' => 'required|array',
            'quantities.*' => 'integer|min:1',
        ]);

        $products = DB::table('products')
            ->whereIn('id', $request->input('product_ids'))
            ->get();

        $totalPrice = 0;
        foreach ($products as $product) {
            $quantity = $request->quantities[$product->id];
            $totalPrice += $product->price * $quantity;
        }

        $storedOrder = [
            'customer_id' => Auth::id(),
            'typePayment_id' => 1,
            'coupon_id' => 1,
            'discount' => 0,
            'tax' => 0,
            'price' => $totalPrice,
            'total_price' => $totalPrice,
            'status' => 'UNPAID',
            'created_at' => Carbon::now()
        ];

        $orderId = DB::table('orders')->insertGetId($storedOrder);

        foreach ($products as $product) {

            $storedDetail = [
                'order_id' => $orderId,
                'product_id' => $product->id,
                'quantity' => $request->quantities[$product->id],
                'price' => $product->price,
                'created_at' => Carbon::now()
            ];

            DB::table('detail_orders')->insert($storedDetail);
        }

        return redirect()->route('order.show', $orderId);
    }


    public function show($id)
    {
        // Ambil data order beserta detail order dan produk yang dibeli

        $order = DB::table('orders')
            ->where('orders.id', $id)
            ->select('orders.*')
            ->first(); // Gunakan first() agar hasilnya objek, bukan array

        if (!$order) {
            return abort(404, "Order tidak ditemukan.");
        }

        // Ambil detail order
        $orderDetails = DB::table('detail_orders')
            ->join('products', 'detail_orders.product_id', '=', 'products.id')
            ->where('detail_orders.order_id', $id)
            ->select('detail_orders.*', 'products.name as product_name')
            ->get();

        return view('customer.order.show', compact('order', 'orderDetails'));
    }
}
