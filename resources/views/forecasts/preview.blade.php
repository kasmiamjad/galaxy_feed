@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Preview Imported Data</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if (isset($data) && $data->isNotEmpty())
        <table class="table table-striped">
            <thead>
                <tr>
                    <!-- Update header based on your Excel columns -->
                    <th>From ID</th>
                    <th>To ID</th>
                    <th>Sender ID</th>
                    <th>Buyer Part ID</th>
                    <th>Description</th>
                    <th>Location</th>
                    <th>Period Start Date</th>
                    <th>Period End Date</th>
                    <th>UOM</th>
                    <th>Order Forecast</th>
                    <th>Forecast Acknowledgement</th>
                    <th>Previous Forecast</th>
                    <th>Forecast Period</th>
                    <th>Compliance Period (months)</th>
                    <th>Compliance Qty on Ground</th>
                    <th>Supplier's On-Hand Stock</th>
                    <th>Supplier's Quality Inspection Stock</th>
                    <th>Supplier's Open POs</th>
                    <th>Supplier's RM On Hand On Order ETA</th>
                    <th>Supplier's Total On-Hand Stock</th>
                    <th>Quantity In-Transit</th>
                    <th>Supplier's On-Hand Under Manufacturing</th>
                    <th>RM Country of Origin</th>
                    <th>PA#</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $row)
                    <tr>
                        <td>{{ $row[0] }}</td>
                        <td>{{ $row[1] }}</td>
                        <td>{{ $row[2] }}</td>
                        <td>{{ $row[3] }}</td>
                        <td>{{ $row[4] }}</td>
                        <td>{{ $row[5] }}</td>
                        <td>
                            @php
                                $startDate = $row[6];
                                try {
                                    $parsedStartDate = \Carbon\Carbon::parse($startDate)->format('Y-m-d');
                                    echo $parsedStartDate;
                                } catch (\Exception $e) {
                                    echo 'Invalid Date';
                                }
                            @endphp
                        </td>
                        <td>
                            @php
                                $endDate = $row[7];
                                try {
                                    $parsedEndDate = \Carbon\Carbon::parse($endDate)->format('Y-m-d');
                                    echo $parsedEndDate;
                                } catch (\Exception $e) {
                                    echo 'Invalid Date';
                                }
                            @endphp
                        </td>
                        <td>{{ $row[8] }}</td>
                        <td>{{ $row[9] }}</td>
                        <td>{{ $row[10] }}</td>
                        <td>{{ $row[11] }}</td>
                        <td>{{ $row[12] }}</td>
                        <td>{{ $row[13] }}</td>
                        <td>{{ $row[14] }}</td>
                        <td>{{ $row[15] }}</td>
                        <td>{{ $row[16] }}</td>
                        <td>{{ $row[17] }}</td>
                        <td>{{ $row[18] }}</td>
                        <td>{{ $row[19] }}</td>
                        <td>{{ $row[20] }}</td>
                        <td>{{ $row[21] }}</td>
                        <td>{{ $row[22] }}</td>
                        <td>{{ $row[23] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination Links -->
        <div class="pagination">
            {{ $data->links() }}
        </div>

        <!-- Form to confirm import -->
        @if (isset($filePath))
            <form action="{{ route('forecasts.confirm') }}" method="POST">
                @csrf
                <input type="hidden" name="file_path" value="{{ $filePath }}">
                <button type="submit" class="btn btn-primary">Confirm Import</button>
            </form>
        @endif
    @else
        <p>No data to display.</p>
    @endif
</div>
@endsection
