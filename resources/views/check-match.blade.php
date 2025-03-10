@extends('layout')

@section('title', 'Check Match')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h4 style="color: black">Check String Match</h4>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('check-match') }}">
                @csrf

                <!-- Input 1 -->
                <div class="mb-3">
                    <label for="input1" class="form-label">Input 1</label>
                    <input type="text" class="form-control" id="input1" name="input1" value="{{ old('input1') }}" required>
                </div>

                <!-- Input 2 -->
                <div class="mb-3">
                    <label for="input2" class="form-label">Input 2</label>
                    <input type="text" class="form-control" id="input2" name="input2" value="{{ old('input2') }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Check Percentage</button>
            </form>

            @if (isset($match_percentage))
                <div class="mt-4 p-3 bg-light border rounded " style="color: white">
                    <h5>Result:</h5>
                    <p><strong>Input 1:</strong> {{ $input1 }}</p>
                    <p><strong>Input 2:</strong> {{ $input2 }}</p>
                    <p><strong>Match Percentage:</strong> {{ $match_percentage }}%</p>
                </div>
            @endif
        </div>
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
@endpush
