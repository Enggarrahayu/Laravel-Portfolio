<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use App\Models\DeliveryRoute;
use App\Models\Order;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function index()
    {
        $deliveries = Delivery::all();
        return view('deliveries.index', compact('deliveries'));
    }
    public function create($order_id)
    {
        $order = Order::findOrFail($order_id);
        $deliveryRoutes = DeliveryRoute::all();

        return view('deliveries.create', compact('order', 'deliveryRoutes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id'
        ]);

        //change order status to in_progress when delivery is created
        $order = Order::findOrFail($request->order_id);
        $order->status = 'in_progress';

        $order->save();

        $delivery = new Delivery();
        $delivery->order_id = $request->order_id;
        $delivery->driver_name = $request->driver_name;
        $delivery->vehicle = $request->vehicle;
        $delivery->delivery_route_id = $request->delivery_route_id;
        $delivery->status = 'in_progress';

        $delivery->save();

        session()->flash('success', 'Delivery created successfully.');
        return redirect()->route('orders.index');
    }
}
