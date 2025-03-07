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


        $order = $this->orderService->show($id);



        return view('customer.order.show', [
            'order' => $order['order'],
            'orderDetails' => $order['orderDetails']
        ]);
    }

    public function exportPdf($orderId) {}
}
