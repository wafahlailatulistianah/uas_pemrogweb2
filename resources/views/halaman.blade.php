<!-- resources/views/halaman.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AC Selection</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            background-color: #f0f8ff;
            font-family: 'Arial', sans-serif;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 40px;
            text-align: center;
            max-width: 500px;
        }
        .container h1 {
            color: #007bff;
            font-size: 2.5em;
            margin-bottom: 20px;
            font-weight: bold;
        }
        .container p {
            font-size: 1.2em;
            color: #333;
            margin-bottom: 30px;
        }
        .btn {
            padding: 10px 20px;
            font-size: 1em;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .ac-image {
            width: 250px;
            height: auto;
            margin-top: 20px;
            animation: acAnimation 2s infinite;
        }
        @keyframes acAnimation {
            0% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to AC Selection</h1>
        <p>Select the best AC for your needs</p>
        <a href="{{ route('account.login') }}" class="btn">Sign Up</a>
        <img src="{{ asset('images/ac.png') }}" alt="Air Conditioner" class="ac-image">
    </div>
</body>
</html>
