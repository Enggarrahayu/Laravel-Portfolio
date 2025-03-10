@extends('layout')

@section('title', 'Add New Delivery Route')

@section('content')
<div class="col-sm-12 col-xl-12">
  <div class="bg-secondary rounded h-100 p-4">
    <h6 class="mb-4">Create Delivery Route</h6>
    <form method="POST" action="{{ route('delivery_routes.store') }}">
      @csrf
      {{ method_field('POST') }}
      {{ csrf_field() }}

      <!-- Start Location -->
      <div class="mb-3">
        <label for="start_location" class="form-label">Start Location</label>
        <input type="text" class="form-control" id="start_location" name="start_location" required>
      </div>

      <!-- End Location -->
      <div class="mb-3">
        <label for="end_location" class="form-label">End Location</label>
        <input type="text" class="form-control" id="end_location" name="end_location" required>
      </div>

      <!-- Volume Base Price -->
      <div class="mb-3">
          <label for="volume_base_price" class="form-label">Volume Base Price</label>
          <input type="number" step="0.01" class="form-control" id="volume_base_price" name="volume_base_price" required>
      </div>

      <!-- Weight Base Price -->
      <div class="mb-3">
          <label for="weight_base_price" class="form-label">Weight Base Price</label>
          <input type="number" step="0.01" class="form-control" id="weight_base_price" name="weight_base_price" required>
      </div>
      
      <button type="submit" class="btn btn-primary">Save Delivery Route</button>
    </form>
  </div>
</div>
@endsection
