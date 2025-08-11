
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HarmonEasee</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
  <!-- Header -->
  <header class="fixed w-full top-0 left-0 bg-white shadow z-50" id="header-placeholder">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
      <!-- Logo dan Nama -->
      <div class="flex items-center space-x-4">
        <img src="{{ asset('img/logo.png') }}" alt="Logo HarmonEasee" class="w-8 h-8 ">
        <span class="font-semibold text-lg ">HarmonEasee</span>
      </div>

      <button id="hamburger" class="sm:hidden text-gray-700 focus:outline-none">
        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
        </svg>
      </button>
      <!-- Menu Navigasi -->
      <nav id="navMenu" class="hidden lg:flex items-center space-x-4">
        <a href="{{ route('user.dashboard')}}" class="text-sm font-medium text-gray-500 hover:text-blue-500 mx-2">Beranda</a>
        <a href="{{ route('user.meditasi') }}" class="text-sm font-medium text-gray-500 hover:text-blue-500 mx-2">Meditasi</a>
        <a href="{{ route('user.tesKesehatan') }}" class="text-sm font-medium text-gray-500 hover:text-blue-500 mx-2">Tes Kesehatan</a>
        <!-- Dropdown Menu -->
        <div class="relative group mx-2" >
          <a href="{{ route('user.ruangedukasi') }}" class="text-sm font-medium text-gray-500 hover:text-blue-500">Ruang Edukasi </a>
          <a class="text-sm font-medium text-gray-500 cursor-pointer" id="ruang-edukasi">▼</a>
          <div id="dropdown-menu" class="absolute hidden group-hover:block bg-white shadow-md mt-2 rounded-lg w-40">
            <a href="{{ route('user.artikel')}}" class="block px-4 py-2 text-sm text-gray-500 hover:bg-gray-100">Artikel</a>
            <a href="{{ route('user.video') }}" class="block px-4 py-2 text-sm text-gray-500 hover:bg-gray-100">Video</a>
            <a href="kategoripodcast.php" class="block px-4 py-2 text-sm text-gray-500 hover:bg-gray-100">Podcast</a>
          </div>
        </div>
        <a href="{{ route('psikolog.daftar') }}" class="text-sm font-medium text-gray-500 hover:text-blue-500 mx-2">Konsultasi</a>
        <button class="text-gray-700 hover:text-blue-500">
          <img src="{{ asset('external/vectori344-knem.svg') }}" alt="" class="h-6 w-6">
        </button>
        <!-- Garis Vertikal -->
        <div class="w-px h-6 bg-gray-900 mx-2 hidden sm:block"></div>
        <!-- Foto Profil -->
        <div id="profile"> 
          <img src="{{ asset('img/profile.jpeg') }}" alt="Foto Profil" class="w-8 h-8 rounded-full border border-gray-300 mx-2">
        </div>
      </nav>      
    </div>
    
    <div id="profile-menu" class="absolute right-0 w-40 bg-white border rounded-lg shadow-lg hidden">
      <span class="mx-4 my-2 font-medium">Samudra Batara</span>
      <a href="profile.php" class="block px-4 py-2 text-gray-700 hover:bg-gray-100"><i class="fas fa-user mr-2"></i>Profile</a>
      <a href="settings.php" class="block px-4 py-2 text-gray-700 hover:bg-gray-100"><i class="fas fa-gear mr-2"></i>Settings</a>
      <a href="{{ route('auth.logout') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100"><i class="fas fa-right-from-bracket mr-2"></i>Logout</a>
    </div>
  </header>

  <script>
    //JavaScript untuk menangani klik dropdown
    document.getElementById('ruang-edukasi').addEventListener('click', function(event) {
      const dropdownMenu = document.getElementById('dropdown-menu');
      
      // Toggle visibility
      dropdownMenu.classList.toggle('hidden');

      // Menghentikan bubbling event agar tidak mempengaruhi elemen lainnya
      event.stopPropagation();
    });

    // Menutup dropdown ketika klik di luar dropdown
    document.addEventListener('click', function(event) {
      const dropdownMenu = document.getElementById('dropdown-menu');
      const ruangEdukasi = document.getElementById('ruang-edukasi');
      
      // Mengecek jika klik terjadi di luar dropdown
      if (!ruangEdukasi.contains(event.target) && !dropdownMenu.contains(event.target)) {
        dropdownMenu.classList.add('hidden');
      }
    });
  
    // Ambil elemen tombol profil dan menu
    const profileButton = document.getElementById('profile');
    const profileMenu = document.getElementById('profile-menu');

    // Tambahkan event listener untuk toggle menu
    profileButton.addEventListener('click', () => {
        profileMenu.classList.toggle('hidden'); // Menampilkan/menghilangkan menu
    });

    // Menutup menu dropdown ketika klik di luar area menu
    document.addEventListener('click', (event) => {
        if (!profileButton.contains(event.target) && !profileMenu.contains(event.target)) {
            profileMenu.classList.add('hidden'); // Sembunyikan menu jika klik di luar
        }
    });

    // Toggle nav menu on hamburger click
    const hamburger = document.getElementById('hamburger');
    const navMenuu = document.getElementById('navMenuH');

    hamburger.addEventListener('click', () => {
      navMenuu.classList.toggle('hidden');
    });

    // Close nav menu if clicked outside
    document.addEventListener('click', (event) => {
      if (!navMenuu.contains(event.target) && !hamburger.contains(event.target)) {
        navMenu.classList.add('hidden');
      }
    });

  </script>
</body>

</html>