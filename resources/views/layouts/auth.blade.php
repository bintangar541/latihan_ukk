<!-- resources/views/layouts/auth.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Kasir App</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            background: #f0f2f5;  /* Latar belakang halaman login */
            font-family: 'Poppins', sans-serif;
        }

        .login-container {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            border: none;
            width: 100%;
            max-width: 400px;
            padding: 30px;
        }

        h3 {
            font-weight: 600;
            color: #333;
        }

        .form-label {
            font-weight: 500;
        }

        .form-control {
            border-radius: 10px;
            box-shadow: none;
            border: 1px solid #ccc;
            transition: border-color 0.3s ease-in-out;
        }

        .form-control:focus {
            border-color: #007bff; /* Warna border saat fokus */
            box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.25);
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            font-weight: 600;
            transition: background-color 0.3s ease-in-out;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .alert {
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    @yield('content')  <!-- Konten Halaman Login -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
