<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Services\OrderService;
use App\Models\Product;
use App\Models\TypePayment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    protected $orderService;


    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }



    public function index()
    {

        $typePayments = TypePayment::all();


        $products = Product::all();


        return view('customer.order.index', compact('products', 'typePayments'));
    }


    public function store(Request $request)
    {
        $order = $this->orderService->store($request);

        if (!empty($order['error'])) {
            return redirect()->back()->withErrors($order['error'])->withInput();
        }

        return redirect($order['tripay_url']);
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
