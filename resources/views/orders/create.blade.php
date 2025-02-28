@extends('layout')

@section('title', 'Add New Transaction')

@section('content')
<div class="col-sm-12 col-xl-12">
  <div class="bg-secondary rounded h-100 p-4">
    <h6 class="mb-4">Create Order</h6>
    <form method="POST" action="{{ route('orders.store') }}">
      @csrf
      {{ method_field('POST') }}
      {{ csrf_field() }}

      <!-- Order Name -->
      <div class="mb-3">
        <label for="name" class="form-label">Order Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
      </div>

      <!-- Weight -->
      <div class="mb-3">
          <label for="weight" class="form-label">Weight (kg)</label>
          <input type="number" step="0.01" class="form-control" id="weight" name="weight" required>
      </div>

      <!-- Volume -->
      <div class="mb-3">
          <label for="volume" class="form-label">Volume (m³)</label>
          <input type="number" step="0.01" class="form-control" id="volume" name="volume" required>
      </div>
      

      <button type="submit" class="btn btn-primary">Save Order</button>
    </form>
  </div>
</div>
@endsection


