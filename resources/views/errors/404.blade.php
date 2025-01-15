<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found!</title>

    <!-- You can add your custom CSS -->
    <style>
        /* Full-screen background image */
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: flex-end;
            background-image: url('{{ asset('assets/images/1111.PNG') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        /* Container for the message and button */
        .error-container {
            text-align: center;
            color: #031426;
            /*background: rgba(0, 0, 0, 0.674);*/ /* Adds a semi-transparent overlay to make the text readable */
            padding: 20px;
            border-radius: 60px;
        }

        /* Styling for the error message */
        h1 {
            font-size: 60px;
            margin-bottom: 20px;
        }

        p {
            font-size: 20px;
            margin-bottom: 30px;
        }

        /* Button styling */
        .btn-home {
            font-size: 18px;
            padding: 10px 20px;
            color: #fff;
            background-color: #022449;
            border: none;
            border-radius: 5px;
            text-decoration: none;
        }

        .btn-home:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="error-container">
        <h1>Oops! Page not found.</h1>
        <p>The page you are looking for doesn't exist or has been moved.</p>
        <a href="{{ url('/') }}" class="btn-home">Go Back to Home..</a>
    </div>

</body>
</html>



{{-- @extends('errors::minimal')

@section('title', __('Not Founddd'))
@section('code', '404')
@section('message', __('Not Found')) --}}
