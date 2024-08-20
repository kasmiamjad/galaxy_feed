
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forecasts DataTable</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Forecasts</h1>
        <table id="forecasts-table" class="display" style="width:100%">
            <thead>
                <tr>
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
                    <th>Compliance Period (Months)</th>
                    <th>Compliance Qty on Ground</th>
                    <th>Supplier's On-Hand Stock</th>
                    <th>Supplier's Quality Inspection Stock</th>
                    <th>Supplier's Open POs</th>
                    <th>Supplier's RM On-Hand On Order ETA</th>
                    <th>Supplier's Total on-hand Stock</th>
                    <th>Quantity In-Transit</th>
                    <th>Supplier's On-Hand under Manufacturing</th>
                    <th>RM Country of Origin</th>
                    <th>PA#</th>
                    <th>Actions</th>
                </tr>
            </thead>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            $('#forecasts-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('forecasts.data') !!}',
                columns: [
                    { data: 'from_id' },
                    { data: 'to_id' },
                    { data: 'sender_id' },
                    { data: 'buyer_part_id' },
                    { data: 'description' },
                    { data: 'location' },
                    { data: 'period_start_date' },
                    { data: 'period_end_date' },
                    { data: 'uom' },
                    { data: 'order_forecast' },
                    { data: 'forecast_acknowledgement' },
                    { data: 'previous_forecast' },
                    { data: 'forecast_period' },
                    { data: 'compliance_period_months' },
                    { data: 'compliance_qty_on_ground' },
                    { data: 'suppliers_on_hand_stock' },
                    { data: 'suppliers_quality_inspection_stock' },
                    { data: 'suppliers_open_pos' },
                    { data: 'suppliers_rm_on_hand_on_order_eta' },
                    { data: 'suppliers_total_on_hand_stock' },
                    { data: 'quantity_in_transit' },
                    { data: 'suppliers_on_hand_under_manufacturing' },
                    { data: 'rm_country_of_origin' },
                    { data: 'pa_number' },
                    {
                        data: 'id', // Assuming the ID field is returned by your server
                        render: function(data, type, row) {
                            return `
                                <a href="/forecasts/${row.id}/edit" class="btn btn-sm btn-primary">Edit</a>
                                <a href="/forecasts/${row.id}" class="btn btn-sm btn-info">View</a>
                                <a href="/forecasts/${row.id}/generateXML" class="btn btn-sm btn-warning">Generate XML</a>
                                <a href="/forecasts/${row.id}/generateAPI" class="btn btn-sm btn-success">Generate API</a>
                            `;
                    },
                        orderable: false, // Disable sorting on the Actions column
                        searchable: false // Disable searching on the Actions column
                    }
                ]
            });
        });
    </script>
</body>
</html>
