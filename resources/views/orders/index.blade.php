@extends('layout')
@section('title', 'Orders List')
@section('content')
<div class="col-sm-12 col-xl-12" style="margin-bottom: 10px;">
  <div class="bg-secondary rounded h-100 p-4">
    <a href="{{route('orders.create')}}" class="btn btn-light m-2">
      <i class="fa fa-plus"></i> Create Order
    </a>
  </div>
</div>
<div class="text-center rounded p-4" style="background-color:whitesmoke;">
  <div class="d-flex align-items-center justify-content-between mb-4">
    <h6 class="mb-0" style="color: slategray;">Orders List</h6>
  </div>
  <div class="table-responsive">
    <table class="table text-start align-middle table-hover mb-0 my-table">
      <thead>
            <tr>
                <th>No</th>
                <th>Order Name</th>
                <th>Weight</th>
                <th>Volume</th>
                <th>Delivery</th>
                <th>Total Price</th>
                <th>Order Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->weight}} kg</td>
                    <td>{{ $order->volume }}m<sup>3</sup></td>
                    <td>{{ $order->delivery->deliveryRoute->route_name ?? 'No Delivery Assigned' }}</td>
                    <td>
                      @if (isset($order->delivery->total_cost))
                      Rp{{ number_format($order->delivery->total_cost, 2) }}
                      @else
                          No Delivery Assigned
                      @endif
                    </td>
                    <td>{{$order->status}}</td>
                    <td>                      
                      @if($order->status == 'pending')
                      <a class="btn btn-info btn-sm" href="{{route('deliveries.create', $order->id)}}" target="_blank">
                        <i class="">Create Delivery</i>
                      </a>
                      @endif
                      <a class="btn btn-warning btn-sm" href="">
                        <i class="fa fa-edit">Edit</i>
                      </a>
                      <form style="display: inline-block;" method="POST" onsubmit="return confirm('Are you sure you want to delete this data?')" action="">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger btn-sm">
                          <i class="fa fa-trash"></i>
                        </button>
                      </form>
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