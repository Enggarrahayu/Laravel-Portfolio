@extends('layout')
@section('title', 'Create Delivery')
@section('content')
<div class="col-sm-12 col-xl-12" style="margin-bottom: 10px;">
  <div class="bg-secondary rounded h-100 p-4">
    <h4 class="mb-4">Create Delivery</h4>
    <form action="{{route('deliveries.store')}}" method="POST">
      @csrf
      
      <!-- Order Information (Autofilled) -->
      <div class="mb-3">
        <label class="form-label">Order Name</label>
        <input type="text" class="form-control" value="{{ $order->name }}" readonly>
        <input type="hidden" class="form-control" value="{{ $order->id }}" name="order_id">
      </div>
      <div class="mb-3">
        <label class="form-label">Weight (kg)</label>
        <input type="text" class="form-control" value="{{ $order->weight }}" readonly>
      </div>
      <div class="mb-3">
        <label class="form-label">Volume (m³)</label>
        <input type="text" class="form-control" value="{{ $order->volume }}" readonly>
      </div>

      <!-- Driver Name Input -->
      <div class="mb-3">
        <label for="driver_name" class="form-label">Driver Name</label>
        <input type="text" class="form-control" id="driver_name" name="driver_name" required>
      </div>

      <!-- Vehicle Input -->
      <div class="mb-3">
        <label for="kendaraan" class="form-label">Vehicle</label>
        <input type="text" class="form-control" id="kendaraan" name="vehicle" required>
      </div>

      <!-- Delivery Route Selection -->
      <div class="mb-3">
        <label for="delivery_route_id" class="form-label">Delivery Route</label>
        <select class="form-select" id="delivery_route_id" name="delivery_route_id" required>
          <option value="" disabled selected>Select Route</option>
          @foreach ($deliveryRoutes as $route)
            <option value="{{ $route->id }}">{{ $route->route_name }}</option>
          @endforeach
        </select>
      </div>

      <!-- Submit Button -->
      <button type="submit" class="btn btn-primary">
        <i class="fa fa-truck"></i> Create Delivery
      </button>
    </form>
  </div>
</div>
@endsection
