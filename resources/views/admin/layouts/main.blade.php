<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard Admin')</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        .fixed-top + .d-flex {
            margin-top: 56px;
        }

        #sidebar {
            position: fixed;
            top: 56px;
            left: 0;
            width: 250px;
            height: calc(100vh - 56px);
            background-color: #f8f9fa;
            transition: left 0.3s ease-in-out;
            z-index: 1000;
            overflow-y: auto;
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
            margin-left: 100px;
            transition: margin-left 0.3s ease-in-out;
            padding: 20px;
            min-height: calc(100vh - 56px);
        }

        .content.shift {
            margin-left: 0;
        }

        .navbar-toggler {
            border: none;
            background: transparent;
        }

        body {
            font-family: 'Kanit', sans-serif;
            background-color: #f5f5f5;
        }
    </style>
</head>

<body>
<header class="fixed-top bg-white shadow">
    <div class="container-fluid px-4 py-3 d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <button class="navbar-toggler" type="button" id="hamburgerButton">
                <img src="{{ asset('img/hamburger-menu-4.png') }}" style="width: 40px; height: 40px;">
            </button>
            <div class="d-flex align-items-center ms-2">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="rounded-circle me-2" style="width: 40px; height: 40px;">
                <span class="fw-semibold fs-5">HarmonEasee</span>
            </div>
        </div>
        
        <div class="d-flex">
            <div class="dropdown me-3">
                <a href="#" id="notificationDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset('img/notification-alert.svg') }}" alt="Notification Icon" class="rounded-circle border border-secondary" style="width: 40px; height: 40px;">
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationDropdown" style="width: 300px;">
                    <li class="dropdown-item text-center fw-bold">Notifications</li>
                    <li><hr class="dropdown-divider"></li>
                    <li class="dropdown-item">Pengguna baru mendaftar</li>
                    <li class="dropdown-item">Pengguna mengirim laporan</li>
                    <li class="dropdown-item">Server maintenence</li>
                    <li class="dropdown-item text-center">
                        <a href="#" class="text-decoration-none">View All</a>
                    </li>
                </ul>
            </div>
            
            <div class="dropdown">
                <a href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset('img/profile.jpeg') }}" alt="Profile" class="rounded-circle border border-secondary" style="width: 40px; height: 40px;">
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                    <li><a class="dropdown-item" href="{{ route('auth.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a></li>
                    <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </ul>
            </div>
        </div>
    </div>
</header>

<div class="flex pt-5">
    <!-- Sidebar -->
    <aside class="bg-light p-4 d-none d-md-block" id="sidebar">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link text-dark {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.konsultasi.index') }}" class="nav-link text-dark {{ request()->routeIs('admin.konsultasi.*') ? 'active' : '' }}">Konsultasi</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.podcast.index') }}" class="nav-link text-dark {{ request()->routeIs('admin.podcast.*') ? 'active' : '' }}">Podcast</a>
            </li>
            <li class="nav-item">
                {{-- <a href="{{ route('admin.psikolog.index') }}" class="nav-link text-dark {{ request()->routeIs('admin.psikolog.*') ? 'active' : '' }}">Psikolog</a> --}}
            </li>
        </ul>
    </aside>

    <!-- Main Content -->
    <main class="content p-4">
        @yield('content')
    </main>
</div>

<!-- Footer -->
<footer class="bg-primary text-white py-4">
    <div class="container text-center">
        <span>Copyright &copy; {{ date('Y') }} HarmonEasee</span>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Sidebar toggle
    const sidebar = document.getElementById('sidebar');
    const hamburgerButton = document.getElementById('hamburgerButton');
    const content = document.querySelector('.content');

    hamburgerButton.addEventListener('click', () => {
        sidebar.classList.toggle('show');
        content.classList.toggle('shift');
    });
</script>

@stack('scripts')
</body>
</html>