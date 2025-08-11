<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin: Data Psikolog</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
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
                <li class="dropdown-item"><a href="{{ route('auth.logout') }}">Log Out</a></li>
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
                <a href="#" class="nav-link text-dark">Konsultasi</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-dark">Podcast</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-dark">Psikolog</a>
            </li>
        </ul>
    </aside>

    <div class="content">
        <div class="container mx-auto my-10 p-5 bg-white rounded shadow-lg">

            <h1 class="text-2xl font-bold mb-5 text-left">Data Psikolog</h1>
            <form method="GET" action="{{ route('adminpsikolog') }}">
                <div class="mb-4">
                    <input 
                        type="text" 
                        name="search" 
                        class="form-control w-full p-2 border rounded" 
                        placeholder="Cari berdasarkan nama psikolog..." 
                        value="{{ request('search') }}">
                </div>
                <div class="mb-4">
                    <button type="submit" class="btn btn-primary bg-blue-500 text-white px-4 py-2 rounded">Cari</button>
                    <a href="{{ route('adminpsikolog.index') }}" class="btn btn-secondary bg-gray-500 text-white px-4 py-2 rounded">Reset</a>
                </div>
            </form>
            <button type="button" class="btn btn-primary bg-blue-500 text-white px-4 py-2 rounded" onclick="toggleForm()">Tampilkan Filter</button>
            <form id="filterForm" method="GET" action="{{ route('adminpsikolog.index') }}" style="display:none;">
                <div class="row mb-4">
                    <div class="col-md-4">
                        <label for="penilaian">Penilaian (1 - 5)</label>
                        <select name="penilaian" class="form-control">
                            <option value="">-- Semua --</option>
                            <option value="1" {{ request('penilaian') == '1' ? 'selected' : '' }}>1.0 – 1.9</option>
                            <option value="2" {{ request('penilaian') == '2' ? 'selected' : '' }}>2.0 – 2.9</option>
                            <option value="3" {{ request('penilaian') == '3' ? 'selected' : '' }}>3.0 – 3.9</option>
                            <option value="4" {{ request('penilaian') == '4' ? 'selected' : '' }}>4.0 – 4.9</option>
                            <option value="5" {{ request('penilaian') == '5' ? 'selected' : '' }}>5.0</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="spesialis">Spesialis</label>
                        <select name="spesialis" class="form-control">
                            <option value="">-- Semua --</option>
                            <option value="anak-remaja" {{ request('spesialis') == 'anak-remaja' ? 'selected' : '' }}>Anak-remaja</option>
                            <option value="konseling" {{ request('spesialis') == 'konseling' ? 'selected' : '' }}>Konseling</option>
                            <option value="klinis" {{ request('spesialis') == 'klinis' ? 'selected' : '' }}>Klinis</option>
                            <!-- tambahkan sesuai kebutuhan -->
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="pengalaman">Pengalaman Min (tahun)</label>
                        <input type="number" name="pengalaman" class="form-control" min="0" value="{{ request('pengalaman') }}">
                    </div>
                </div>
                <div class="mb-4">
                    <button type="submit" class="btn btn-primary">Filter</button>
                    <a href="{{ route('adminpsikolog.index') }}" class="btn btn-secondary">Reset</a>
                </div>
            </form>


            <div class="mb-4 d-flex justify-content-end">
                <a href="{{ route('adminpsikolog.create') }}" class="btn btn-success">+ Tambah Data</a>
            </div>
        
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Psikolog</th>
                                <th>Nomor Lisensi</th>
                                <th>Jenis Kelamin</th>
                                <th>Spesialis</th>
                                <th>Pengalaman</th>
                                <th>Penilaian</th>
                            </tr>
                        </thead>
                        @foreach ($psikolog as $psikolog)
                            <tr>
                                <td>{{ $psikolog->nama_lengkap }}</td>
                                <td>{{ $psikolog->nomor_lisensi }}</td>
                                <td>{{ $psikolog->gender }}</td>
                                <td>{{ ucfirst($psikolog->spesialis) }}</td>
                                <td>{{ $psikolog->pengalaman_tahun }}</td>
                                <td>{{ $psikolog->penilaian }}/5</td>
                                <td>
                                    <button 
                                        class="btn btn-info btn-sm view-detail"
                                        data-bs-toggle="modal" 
                                        data-bs-target="#detailModal"
                                        data-id="{{ $psikolog->id }}"
                                        data-foto="{{ asset('storage/'.$psikolog->foto) }}"
                                        data-nama="{{ $psikolog->nama_lengkap }}"
                                        data-lisensi="{{ $psikolog->nomor_lisensi }}"
                                        data-gender="{{ $psikolog->gender }}"
                                        data-spesialis="{{ ucfirst($psikolog->spesialis) }}"
                                        data-pengalaman="{{ $psikolog->pengalaman_tahun }}"
                                        data-penilaian="{{ $psikolog->penilaian }}"
                                        
                                    >
                                        Lihat Detail
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                            
                    </table>
                </div>
            </div>
        </div>
        <!-- Modal Detail Psikolog -->
        <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailModalLabel">Detail Psikolog</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex align-items-start">
                        <img id="modalFoto" src="{{ asset($psikolog->foto) }}" class="rounded border me-4" style="width: 120px; height: 120px; object-fit: cover;">
                    <div>
                    <p><strong>Nama:</strong> <span id="modalNama"></span></p>
                    <p><strong>Nomor Lisensi:</strong> <span id="modalLisensi"></span></p>
                    <p><strong>Jenis Kelamin:</strong> <span id="modalGender"></span></p>
                    <p><strong>Spesialis:</strong> <span id="modalSpesialis"></span></p>
                    <p><strong>Pengalaman (Tahun):</strong> <span id="modalPengalaman"></span></p>
                    <p><strong>Penilaian:</strong> <span id="modalPenilaian"></span>/5</p>
                </div>
            </div>
            <div class="modal-footer ">
                <a id="editButton" href="{{ route('adminpsikolog.edit', $psikolog->id) }}" class="btn btn-warning">Edit</a>
                <form method="POST" id="deleteForm" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Delete</button>
                </form>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
            </div>
        </div>

    </div>
    <footer class="sticky-footer py-4" style="background-color: #7AD8FE;">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; HarmonEasee</span>
            </div>
        </div>
    </footer>
 </div>
                
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    // Mengambil elemen sidebar dan tombol hamburger
    const sidebar = document.getElementById('sidebar');
    const hamburgerButton = document.getElementById('hamburgerButton');
    const content = document.querySelector('.content');

    // Menambahkan event listener untuk membuka dan menutup sidebar
    hamburgerButton.addEventListener('click', () => {
        sidebar.classList.toggle('show'); // Menampilkan atau menyembunyikan sidebar
        content.classList.toggle('shift'); // Menggeser konten utama saat sidebar muncul
    });
    function toggleForm() {
        var form = document.getElementById("filterForm");
        form.style.display = (form.style.display === "none") ? "block" : "none";
    }
    document.querySelectorAll('.view-detail').forEach(button => {
            button.addEventListener('click', function () {
                document.getElementById('modalFoto').src = this.dataset.foto;
                document.getElementById('modalNama').textContent = this.dataset.nama;
                document.getElementById('modalLisensi').textContent = this.dataset.lisensi;
                document.getElementById('modalGender').textContent = this.dataset.gender;
                document.getElementById('modalSpesialis').textContent = this.dataset.spesialis;
                document.getElementById('modalPengalaman').textContent = this.dataset.pengalaman;
                document.getElementById('modalPenilaian').textContent = this.dataset.penilaian;
                
                const id = this.dataset.id;

                // Atur link Edit dan form Delete
                document.getElementById('editButton').href = `/admin/psikolog/${id}/edit`;
                document.getElementById('deleteForm').action = `/admin/psikolog/${id}`;

            });
        });
</script>
    
</body>

</html>
