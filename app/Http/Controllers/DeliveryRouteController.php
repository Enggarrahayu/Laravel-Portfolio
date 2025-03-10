<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use App\Models\DeliveryRoute;
use Illuminate\Http\Request;

class DeliveryRouteController extends Controller
{
    public function index()
    {
        $delivery_routes = DeliveryRoute::all();
        
        return view('delivery_routes.index', compact('delivery_routes'));
    }

    public function create()
    {
        return view('delivery_routes.create');
    }

    public function store(Request $request)
    {
        $data_delivert_routes = $request->all();
        DeliveryRoute::create($data_delivert_routes);

        session()->flash('success', 'Delivery Route created successfully.');
        return redirect()->route('delivery_routes.index');
    }

    public function edit($id)
    {
        $delivery_route = DeliveryRoute::findOrFail($id);

        return view('delivery_routes.edit', compact('delivery_route'));
    }

    public function update(Request $request, $id)
    {
        $delivery_route = DeliveryRoute::findOrFail($id);
        $delivery_route_data = $request->all();
        $delivery_route->update($delivery_route_data);

        session()->flash('success', 'Delivery Route edited successfully');
        return redirect()->route('delivery_routes.index');
    }

    public function destroy($id)
    {
        $delivery_route = DeliveryRoute::findOrFail($id);
        $delivery_route->delete();

        session()->flash('success', 'Delivery Route deleted successfully');
        return redirect()->route('delivery_routes.index');
    }
}
