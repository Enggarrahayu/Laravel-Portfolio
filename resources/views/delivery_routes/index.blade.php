@extends('layout')

@section('title', 'Delivery Routes List')

@section('content')
<div class="col-sm-12 col-xl-12" style="margin-bottom: 10px;">
  <div class="bg-secondary rounded h-100 p-4">
    <a href="{{route('delivery_routes.create')}}" class="btn btn-light m-2">
      <i class="fa fa-plus"></i> Create Delivery Route
    </a>
  </div>
</div>

<div class="text-center rounded p-4" style="background-color:whitesmoke;">
  <div class="d-flex align-items-center justify-content-between mb-4">
    <h6 class="mb-0" style="color: slategray;">Delivery Routes List</h6>
  </div>
  <div class="table-responsive">
    <table class="table text-start align-middle table-hover mb-0 my-table">
      <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Volume Base Price</th>
                <th>Weight Base Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($delivery_routes as $route)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $route->route_name }}</td>
                    <td>Rp{{ number_format($route->volume_base_price, 2) }}</td>
                    <td>Rp{{ number_format($route->weight_base_price, 2) }}</td>
                    <td>                      
                      <a class="btn btn-warning btn-sm" href="{{ route('delivery_routes.edit', $route->id) }}">
                        <i class="fa fa-edit"> Edit</i>
                      </a>
                      <form style="display: inline-block;" method="POST" onsubmit="return confirm('Are you sure you want to delete this data?')" action="{{ route('delivery_routes.destroy', $route->id) }}">
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
