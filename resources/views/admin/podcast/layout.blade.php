<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;600&display=swap" rel="stylesheet">

    <style>
        .fixed-top + .d-flex {
            margin-top: 56px;
        }

        #sidebar {
            position: fixed;
            top: 100;
            left: 0;
            width: 250px;
            height: 100vh;
            background-color: #f8f9fa;
            transition: left 0.3s ease-in-out;
        }

        #sidebar.show {
            left: -250px;
        }

        .sidebar-link {
            padding: 15px;
            text-decoration: none;
            color: #000;
            display: block;
        }

        .sidebar-link:hover {
            background-color: #e9ecef;
        }

        .content {
            margin-left: 250px;
            transition: margin-left 0.3s ease-in-out;
        }

        .content.shift {
            margin-left: 0;
        }

        .navbar-toggler {
            border: none;
            background: transparent;
        }
    </style>
</head>

<body class="bg-gray-100" style="font-family: 'Kanit', sans-serif">
<header class="fixed-top bg-white shadow">
    <div class="container-fluid px-4 py-3 d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <button class="navbar-toggler" type="button" id="hamburgerButton">
                <img src="{{ asset('img/hamburger-menu-4.png') }}" style="width: 40px; height: 40px;">
            </button>
            <div class="d-flex align-items-center ms-2">
                <img src="{{ asset('img/logofull2.png') }}" alt="Logo" class="rounded-circle me-2" style="width: 40px; height: 40px;">
                <span class="fw-semibold fs-5">HarmonEasee</span>
            </div>
        </div>
        <a href="{{ url('profile') }}">
            <img src="{{ asset('img/profile.jpeg') }}" alt="Profil" class="rounded-circle border border-secondary" style="width: 40px; height: 40px;">
        </a>
    </div>
</header>

<div class="flex pt-5">
    <aside class="bg-light p-4 d-none d-md-block" id="sidebar">
        <ul class="nav flex-column position-fixed">
            <li class="nav-item"><a href="{{ route('admin.dashboard') }}" class="nav-link text-dark">Dashboard</a></li>
            <li class="nav-item"><a href="#" class="nav-link text-dark">Konsultasi</a></li>
            <li class="nav-item"><a href="{{ route('admin.podcast.index') }}" class="nav-link text-dark">Podcast</a></li>
            <li class="nav-item"><a href="#" class="nav-link text-dark">Psikolog</a></li>
        </ul>
    </aside>

    <main class="content p-4">
        @yield('content')
    </main>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const sidebar = document.getElementById('sidebar');
    const hamburgerButton = document.getElementById('hamburgerButton');
    const content = document.querySelector('.content');

    hamburgerButton.addEventListener('click', () => {
        sidebar.classList.toggle('show');
        content.classList.toggle('shift');
    });
</script>
</body>
</html>
