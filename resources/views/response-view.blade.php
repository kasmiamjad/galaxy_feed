<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Response View</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Include your CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ url('/') }}">Galaxy Enterprices</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('forecasts.index') }}">Forecasts</a>
                </li>
                <!-- Add more navigation links as needed -->
            </ul>
        </div>
    </nav>
    <div class="container">
        
        <h1>Response</h1>

        <div class="alert alert-success" role="alert">
            {{ $message }}
        </div>
    </div>
</body>
</html>
