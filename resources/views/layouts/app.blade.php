<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Kasir App</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <style>
        /* Sidebar */
        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            background: #343a40;
            color: white;
            padding: 15px;
            top: 0;
            left: 0;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .sidebar .nav-link {
            color: white;
            padding: 10px;
            border-radius: 5px;
        }
        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            background: #007bff;
        }

        /* Navbar */
        .navbar {
            width: calc(100% - 250px);
            position: fixed;
            top: 0;
            left: 250px;
            z-index: 1000;
        }

        /* Konten utama */
        .main-content {
            margin-left: 250px;
            margin-top: 56px;
            padding: 20px;
            width: calc(100% - 250px);
        }

        /* Responsif */
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }
            .navbar {
                width: 100%;
                left: 0;
            }
            .main-content {
                margin-left: 0;
                width: 100%;
            }
        }
    </style>
</head>
<body>

    @auth
        <!-- Sidebar -->
        <div class="sidebar">
            @include('layouts.sidebar')
        </div>

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <button class="btn btn-outline-light d-md-none" id="toggleSidebar">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand ms-3" href="{{ route('dashboard') }}">Kasir</a>
            </div>
        </nav>
    @endauth

    <!-- Konten utama -->
    <div class="main-content">
        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Script Toggle Sidebar -->
    <script>
        document.getElementById("toggleSidebar")?.addEventListener("click", function() {
            document.querySelector(".sidebar").classList.toggle("d-none");
        });
    </script>
</body>
</html>
