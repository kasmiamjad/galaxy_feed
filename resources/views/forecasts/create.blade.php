@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Forecast</h1>

    <form action="{{ route('forecasts.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="field1">Field1</label>
            <input type="text" name="field1" class="form-control" id="field1" required>
        </div>
        <div class="form-group">
            <label for="field2">Field2</label>
            <input type="text" name="field2" class="form-control" id="field2" required>
        </div>
        <!-- Add more fields as necessary -->
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
