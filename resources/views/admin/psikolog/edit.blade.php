<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Psikolog</title>
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
                    <a href="{{ route('admin.dashboard') }}" class="nav-link text-dark">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-dark">Tes Kesehatan</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-dark">Konsultasi</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-dark">Podcast</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('adminpsikolog.index') }}" class="nav-link text-dark">Psikolog</a>
                </li>
            </ul>
        </aside>
        <div class="content">
    <div class="container mx-auto my-10 p-5 bg-white rounded shadow-lg">
        <h1 class="text-3xl font-bold mb-5 text-center text-gray-800">Edit Data Psikolog</h1>
        <form action="{{ route('adminpsikolog.update', $psikolog->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" value="{{ old('nama_lengkap', $psikolog->nama_lengkap) }}" required>
            </div>

            <div class="mb-3">
                <label for="nomor_lisensi" class="form-label">Nomor Lisensi</label>
                <input type="text" class="form-control" name="nomor_lisensi" id="nomor_lisensi" value="{{ old('nomor_lisensi', $psikolog->nomor_lisensi) }}" required>
            </div>

            <div class="mb-3">
                <label for="gender" class="form-label">Jenis Kelamin</label>
                <select class="form-select" name="gender" id="gender" required>
                    <option value="male" {{ old('gender', $psikolog->gender) == 'male' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="female" {{ old('gender', $psikolog->gender) == 'female' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="spesialis" class="form-label">Spesialis</label>
                <input type="text" class="form-control" name="spesialis" id="spesialis" value="{{ old('spesialis', $psikolog->spesialis) }}">
            </div>

            <div class="mb-3">
                <label for="pengalaman_tahun" class="form-label">Pengalaman (Tahun)</label>
                <input type="number" class="form-control" name="pengalaman_tahun" id="pengalaman_tahun" value="{{ old('pengalaman_tahun', $psikolog->pengalaman_tahun) }}" min="0">
            </div>

            <div class="mb-3">
                <label for="biaya_konsultasi" class="form-label">Biaya Konsultasi</label>
                <input type="number" class="form-control" name="biaya_konsultasi" id="biaya_konsultasi" value="{{ old('biaya_konsultasi', $psikolog->biaya_konsultasi) }}" required>
            </div>

            <div class="mb-3">
                <label for="penilaian" class="form-label">Penilaian</label>
                <input type="number" step="0.1" class="form-control" name="penilaian" id="penilaian" value="{{ old('penilaian', $psikolog->penilaian) }}" min="0" max="5">
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label">Foto (Kosongkan jika tidak ingin ganti)</label>
                <input type="file" class="form-control" name="foto" id="foto">
                @if ($psikolog->foto)
                    <p class="mt-2">Foto Saat Ini:</p>
                    <img src="{{ asset('storage/' . $psikolog->foto) }}" alt="Foto Psikolog" width="150">
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('adminpsikolog.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
    
