<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('delivery')->get();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        return view('orders.create');
    }
    public function store(Request $request)
    {
        $order_data = $request->only('name','weight','volume');
        Order::create($order_data);

        session()->flash('success', 'Order created successfully.');
        return redirect()->route('orders.index');
    }


}
