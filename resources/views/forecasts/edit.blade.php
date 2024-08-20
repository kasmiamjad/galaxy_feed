@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Forecast</h1>

    <form action="{{ route('forecasts.update', $forecast->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="field1">Field1</label>
            <input type="text" name="field1" class="form-control" id="field1" value="{{ $forecast->field1 }}" required>
        </div>
        <div class="form-group">
            <label for="field2">Field2</label>
            <input type="text" name="field2" class="form-control" id="field2" value="{{ $forecast->field2 }}" required>
        </div>
        <!-- Add more fields as necessary -->
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
