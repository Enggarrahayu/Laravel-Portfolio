@extends('layout')
@section('title', 'Orders List')
@section('content')
<div class="col-sm-12 col-xl-12 mb-3">
  <div style="width: 40%; margin: auto;">
    <h3 class="text-center mt-3">Order Data Summary</h3>
    <canvas id="circleChart"></canvas>
</div>
</div>
@endsection
@push('scripts')
<script>
  var ctx = document.getElementById('circleChart').getContext('2d');

  var circleChart = new Chart(ctx, {
      type: 'doughnut', 
      data: {
          labels: {!! json_encode(array_keys($data)) !!},
          datasets: [{
              data: {!! json_encode(array_values($data)) !!},
              backgroundColor: ['#4CAF50', '#F44336', '#FFC107'], 
              hoverOffset: 4
          }]
      },
      options: {
          responsive: true,
          plugins: {
              legend: {
                  position: 'bottom'
              }
          }
      }
  });
</script>
@endpush