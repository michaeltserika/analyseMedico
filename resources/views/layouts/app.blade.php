<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Medical System') }}</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Chart.js CDN pour le Dashboard -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js"></script>

    <!-- Font Awesome CDN pour les icônes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Styles personnalisés pour un design sophistiqué -->
    <style>
        body {
            background: linear-gradient(135deg, #ECE5DD 0%, #D3D3D3 100%);
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
        }
        .navbar {
            background: linear-gradient(to right, #075E54, #128C7E);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .navbar a {
            color: #25D366;
            margin-right: 20px;
            font-weight: 500;
            transition: color 0.3s ease;
        }
        .navbar a:hover {
            color: #20c058;
        }
        .btn-primary {
            background: #25D366;
            border: none;
            border-radius: 25px;
            padding: 10px 20px;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background: #20c058;
            transform: translateY(-2px);
        }
        .container {
            background: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
            margin-top: 30px;
        }
        .table {
            border-radius: 10px;
            overflow: hidden;
        }
        .table thead {
            background: #075E54;
            color: #fff;
        }
        .dropdown-menu {
            background: #075E54;
            border: none;
            border-radius: 10px;
        }
        .dropdown-item {
            color: #25D366;
        }
        .dropdown-item:hover {
            background: #25D366;
            color: #075E54;
        }
        h1 {
            color: #075E54;
            font-weight: 600;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-md shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="fas fa-hospital me-2"></i> {{ config('app.name', 'Medical System') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}"><i class="fas fa-chart-line me-1"></i> Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('patients.index') }}"><i class="fas fa-user me-1"></i> Patients</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('medecins.index') }}"><i class="fas fa-user-md me-1"></i> Médecins</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('analyses.index') }}"><i class="fas fa-vial me-1"></i> Analyses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('resultats.index') }}"><i class="fas fa-file-alt me-1"></i> Résultats</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('factures.index') }}"><i class="fas fa-file-invoice me-1"></i> Factures</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('stats.index') }}"><i class="fas fa-chart-pie me-1"></i> Statistiques</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                <i class="fas fa-user-circle me-1"></i> {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt me-1"></i> Déconnexion
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-sign-in-alt me-1"></i> Connexion</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}"><i class="fas fa-user-plus me-1"></i> Inscription</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
