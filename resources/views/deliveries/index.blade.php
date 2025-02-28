@extends('layout')
@section('title', 'Delivery Orders List')
@section('content')
<div class="text-center rounded p-4" style="background-color:whitesmoke;">
  <div class="d-flex align-items-center justify-content-between mb-4">
    <h6 class="mb-0" style="color: slategray;">Delivery Orders List</h6>
  </div>
  <div class="table-responsive">
    <table class="table text-start align-middle table-hover mb-0 my-table">
      <thead>
            <tr>
                <th>No</th>
                <th>Order Name</th>
                <th>Weight</th>
                <th>Volume</th>
                <th>Route</th>
                <th>Driver</th>
                <th>Vehicle</th>
                <th>Total Cost</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($deliveries as $delivery)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $delivery->order->name }}</td>
                    <td>{{ $delivery->order->weight}} kg</td>
                    <td>{{ $delivery->order->volume }}m<sup>3</sup></td>
                    <td>{{ $delivery->deliveryRoute->route_name ?? 'No Route Assigned' }}</td>
                    <td>{{ $delivery->driver_name }}</td>
                    <td>{{ $delivery->vehicle }}</td>
                    <td>Rp{{ number_format($delivery->total_cost, 2) }}</td>
                    <td>{{$delivery->order->status}}</td>
                    <td>
                     
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
  </div>
</div>
@endsection
@push('scripts')
@if(session('success'))
<script>
  Swal.fire({
    icon: 'success',
    title: 'Success',
    text: "{{ session('success') }}",
  });
</script>
@endif

<script>
  $(document).ready(function() {
    $('.my-table').DataTable();
  });
</script>
@endpush