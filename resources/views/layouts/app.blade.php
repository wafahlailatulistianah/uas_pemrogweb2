<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            min-height: 100vh;
            margin: 0;
            background-color: #f8f9fa; /* Latar belakang */
        }
        .navbar {
            background-color: #5f9ea0; /* Warna hijau sage */
        }
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            height: 100%;
            width: 250px; /* Lebar sidebar */
            background-color: #2e8b57; /* Warna hijau tua */
            color: white;
            padding-top: 60px; /* Padding atas untuk jarak dari navbar */
        }
        .sidebar .navbar-brand {
            font-size: 1.5rem;
            color: #fff;
            display: block;
            text-align: center;
            margin-bottom: 20px;
        }
        .sidebar .nav-link {
            color: #ced4da;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            text-decoration: none;
            transition: color 0.3s;
        }
        .sidebar .nav-link:hover {
            color: #fff;
            background-color: #3cb371; /* Warna hover hijau muda */
        }
        .sidebar .nav-link .fas {
            margin-right: 10px;
        }
        .content {
            margin-left: 250px; /* Margin untuk menghindari overlay dengan sidebar */
            padding: 20px;
        }
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                position: relative;
                padding-top: 15px;
                height: auto;
            }
            .content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#">PEMILIHAN AC</a>
    </nav>
    
    <div class="sidebar">
        <a class="navbar-brand" href="#">PEMILIHAN AC</a>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('account.dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('alternatif.index') }}">
                    <i class="fas fa-users"></i>
                    Data Alternatif
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('kriteria.index') }}">
                    <i class="fas fa-th-list"></i>
                    Data Kriteria
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('perhitungan.index') }}">
                    <i class="fas fa-calculator"></i>
                    Perhitungan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('account.logout') }}">
                    <i class="fas fa-sign-out-alt"></i>
                    Logout
                </a>
            </li>
        </ul>
    </div>

    <div class="content">
        <div class="container mt-4">
            @yield('content')
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
