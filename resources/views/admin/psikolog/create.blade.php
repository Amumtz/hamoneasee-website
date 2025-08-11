<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Audio</title>
    <!-- Tailwind CSS -->
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .fixed-top + .d-flex {
            margin-top: 56px; /* Adjust based on header height */
        }

         /* Sidebar */
         #sidebar {
            position: fixed;
            top: 100;
            left: 0; /* Sidebar tersembunyi di kiri layar */
            width: 250px;
            height: 100vh;
            background-color: #f8f9fa;
            transition: left 0.3s ease-in-out; /* Efek transisi saat sidebar muncul atau hilang */
        }

        #sidebar.show {
            left: -250px; /* Sidebar muncul */
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

        /* Konten utama agar tidak tertutup sidebar */
        .content {
            margin-left: 250px; /* Memberi ruang agar konten tidak tertutup sidebar */
            transition: margin-left 0.3s ease-in-out;
        }

        .content.shift {
            margin-left: 0; /* Saat sidebar muncul, konten digeser ke kanan */
        }

        /* Tombol hamburger */
        .navbar-toggler {
            border: none;
            background: transparent;
        }
    </style>
</head>
<body class="bg-gray-100" style="font-family: 'Kanit', sans-serif">
<header class="fixed-top bg-white shadow">
  <div class="container-fluid px-4 py-3 d-flex justify-content-between align-items-center">
    
    <!-- Tombol hamburger dan logo dalam satu container -->
    <div class="d-flex align-items-center">
      <!-- Tombol hamburger -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" id="hamburgerButton">
        <span class="navbar-toggler-icon"></span><img src="{{ asset('img/hamburger-menu-4.png') }}" style="width: 40px; height: 40px;">
      </button>
      
      <!-- Logo dan Nama -->
      <div class="d-flex align-items-center ms-2"> <!-- ms-2 untuk jarak lebih kecil antara hamburger dan logo -->
         <img src="{{ asset('img/logo.png') }}" alt="Logo HarmonEasee" class="rounded-circle me-2" style="width: 40px; height: 40px;">
        <span class="fw-semibold fs-5" style="font-family: 'Kanit', sans-serif;">HarmonEasee</span>
      </div>
    </div>

    <div class="d-flex">
    
    <div class="dropdown">
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
    <!-- Foto Profil -->
    <div class="d-flex align-items-center ms-2"> <!-- ms-2 untuk jarak lebih kecil antara hamburger dan logo -->
    <div class="dropdown">
            <a href="#" id="notificationDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="{{ asset('img/profile.jpeg') }}" alt="Foto Profil" class="rounded-circle border border-secondary" style="width: 40px; height: 40px;">
            </a>

            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationDropdown" style="width: 300px;">
                <li class="dropdown-item text-center fw-bold"></li>
                <li><hr class="dropdown-divider"></li>
                <li class="dropdown-item"><a href="logout.php">Log Out</a></li>
                <!-- <li class="dropdown-item text-center">
                    <a href="#" class="text-decoration-none">View All</a>
                </li> -->
            </ul>
        </div>
    </div>
    </div>
  </div> 
</header>
<div class="flex pt-5">
    
        <!-- Sidebar -->
        <aside class="bg-light p-4 d-none d-md-block" style="width: 250px; min-height: 100vh;" id="sidebar">
            <ul class="nav flex-column position-fixed">
                <li class="nav-item">
                    <a href="admindb.php" class="nav-link text-dark">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-dark">Tes Kesehatan</a>
                </li>
                <li class="nav-item">
                    <a href="#adminkonsultasi.php" class="nav-link text-dark">Konsultasi</a>
                </li>
                <li class="nav-item">
                    <a href="podcastadmin.php" class="nav-link text-dark">Podcast</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('adminpsikolog.index') }}" class="nav-link text-dark">Psikolog</a>
                </li>
            </ul>
        </aside>
        <div class="content">
    <div class="container mx-auto my-10 p-5 bg-white rounded shadow-lg">
        <h1 class="text-3xl font-bold mb-5 text-center text-gray-800">Tambah Data Audio</h1>
    <form action="{{ route('adminpsikolog') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
    </div>

    <div class="mb-3">
        <label for="nomor_lisensi" class="form-label">Nomor Lisensi</label>
        <input type="text" class="form-control" id="nomor_lisensi" name="nomor_lisensi" required>
    </div>

    <div class="mb-3">
        <label for="gender" class="form-label">Gender</label>
        <select class="form-select" id="gender" name="gender" required>
            <option value="male">Laki-laki</option>
            <option value="female">Perempuan</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="usia_range" class="form-label">Usia</label>
        <select class="form-select" id="usia_range" name="usia_range" required>
            <option value="25-30">25 - 30 tahun</option>
            <option value="30-35">30 - 35 tahun</option>
            <option value=">35">> 35 tahun</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="spesialis" class="form-label">Spesialis</label>
        <select class="form-select" id="spesialis" name="spesialis" required>
            <option value="klinis">Psikolog Klinis</option>
            <option value="konseling">Psikolog Konseling</option>
            <option value="anak-remaja">Psikolog Anak dan Remaja</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="kualifikasi" class="form-label">Kualifikasi</label>
        <textarea class="form-control" id="kualifikasi" name="kualifikasi" rows="3"></textarea>
    </div>

    <div class="mb-3">
        <label for="pengalaman_tahun" class="form-label">Pengalaman Tahun</label>
        <input type="number" class="form-control" id="pengalaman_tahun" name="pengalaman_tahun" required>
    </div>

    <div class="mb-3">
        <label for="biaya_konsultasi" class="form-label">Biaya Konsultasi</label>
        <input type="number" class="form-control" id="biaya_konsultasi" name="biaya_konsultasi" required>
    </div>

    <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi</label>
        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
    </div>

    <div class="mb-3">
        <label for="penilaian" class="form-label">Penilaian (0-5)</label>
        <input type="number" step="0.1" min="0" max="5" class="form-control" id="penilaian" name="penilaian">
    </div>

    <div class="mb-3">
        <label class="form-label">Issues</label>
        <div class="row">
            @php
                $issues = [
                    1 => 'Depresi',
                    2 => 'Gangguan kecemasan',
                    3 => 'Gangguan Kepribadian',
                    4 => 'Gangguan makan',
                    5 => 'PTSD',
                    6 => 'Transisi hidup',
                    7 => 'Stress',
                    8 => 'Kepercayaan diri',
                    9 => 'Pengelolaan emosi',
                    10 => 'Gangguan belajar',
                    11 => 'Masalah perilaku',
                    12 => 'Trauma masa kecil',
                    13 => 'Bullying',
                    14 => 'Masalah perkembangan',
                ];
            @endphp

            @foreach($issues as $key => $label)
                <div class="col-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="issues[]" value="{{ $key }}" id="issue{{ $key }}">
                        <label class="form-check-label" for="issue{{ $key }}">{{ $label }}</label>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="mb-3">
        <label for="foto" class="form-label">Foto</label>
        <input class="form-control" type="file" id="foto" name="foto" required>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
