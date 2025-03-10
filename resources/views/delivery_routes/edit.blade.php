@extends('layout')

@section('title', 'Edit Delivery Route')

@section('content')
<div class="col-sm-12 col-xl-12">
  <div class="bg-secondary rounded h-100 p-4">
    <h6 class="mb-4">Edit Delivery Route</h6>
    <form method="POST" action="{{ route('delivery_routes.update', $delivery_route->id) }}">
      @csrf
      {{ method_field('PUT') }}
      
      <!-- Start Location -->
      <div class="mb-3">
        <label for="start_location" class="form-label">Start Location</label>
        <input type="text" class="form-control" id="start_location" name="start_location" value="{{ old('start_location', $delivery_route->start_location) }}" required>
      </div>

      <!-- End Location -->
      <div class="mb-3">
        <label for="end_location" class="form-label">End Location</label>
        <input type="text" class="form-control" id="end_location" name="end_location" value="{{ old('end_location', $delivery_route->end_location) }}" required>
      </div>

      <div class="mb-3">
          <label for="volume_base_price" class="form-label">Volume Base Price</label>
          <input type="number" step="0.01" class="form-control" id="volume_base_price" name="volume_base_price" value="{{ old('volume_base_price', $delivery_route->volume_base_price) }}" required>
      </div>

      <div class="mb-3">
          <label for="weight_base_price" class="form-label">Weight Base Price</label>
          <input type="number" step="0.01" class="form-control" id="weight_base_price" name="weight_base_price" value="{{ old('weight_base_price', $delivery_route->weight_base_price) }}" required>
      </div>
      
      <button type="submit" class="btn btn-primary">Update Delivery Route</button>
    </form>
  </div>
</div>
@endsection