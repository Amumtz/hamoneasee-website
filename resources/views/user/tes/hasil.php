<?php
session_start();
require_once('koneksi.php');

// Ambil total skor dari sesi
$skorTotal = $_SESSION['skor_total'] ?? 0;

// Ambil kategori hasil dari database
$sql = "SELECT * FROM hasil_tes WHERE min_skor <= ? AND max_skor >= ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ii", $skorTotal, $skorTotal);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$hasil = mysqli_fetch_assoc($result);

// Jika tidak ada hasil ditemukan
if (!$hasil) {
    $hasil = [
        'kategori' => 'Tidak Diketahui',
        'deskripsi' => 'Skor Anda tidak sesuai dengan rentang yang tersedia.',
        'rekomendasi' => 'Silakan hubungi administrator untuk informasi lebih lanjut.'
    ];
}

// Tentukan warna berdasarkan kategori
$kategori = htmlspecialchars($hasil['kategori']);
switch ($kategori) {
    case 'Kecemasan Berat':
        $warnaKategori = 'bg-red-500'; // Warna merah
        break;
    case 'Kecemasan Sedang':
        $warnaKategori = 'bg-yellow-500'; // Warna kuning
        break;
    case 'Kecemasan Ringan':
        $warnaKategori = 'bg-green-500'; // Warna hijau
        break;
    default:
        $warnaKategori = 'bg-gray-500'; // Warna abu-abu (default)
        break;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Tes Kesehatan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    <header class="fixed z-10 w-full px-10 bg-white h-20">
        <div class="flex justify-between mt-5">
            <div class="flex items-center">
                <div class=" h-10 w-10 border-2 rounded-md shadow-sm">
                  <button class="back-button text-xl ml-2 mt-1 text-center  hover:text-gray-300">
                    <i class="fa-solid fa-arrow-left"></i>
                  </button>
                </div>
                <nav class="text-gray-600 text-sm ml-5">
                  <a href="index.php" class="hover:underline">Home</a>
                  <span class="mx-2">›</span>
                  <a href="teskesehatan.php" class="font-medium text-sm hover:underline">Kategori Tes</a>
                  <span class="mx-2">›</span>
                  <a href="soaltes1.php" class="font-medium text-sm hover:underline">Tes Kesehatan</a>
                  <span class="mx-2">›</span>
                  <a href="hasil.php" class="font-medium text-sm text-gray-900 hover:underline">Hasil Tes</a>
                </nav>
            </div>
            <div class="flex">
                <div class="flex border rounded-full w-10 h-10 bg-gray-200">
                    <button class="text-gray-700 mx-2 my-2">
                        <img src="external/vectori344-knem.svg" alt="" class="h-6 w-6">
                    </button>
                </div>
                <div class="mx-4" id="profile">
                    <img src="external/ellipse23437-cpab-200h.png" alt="" class="w-10 h-10">
                </div>
    
                <div id="profile-menu" class="absolute right-0 mt-12 w-40 bg-white border rounded-lg shadow-lg hidden">
                  <span class="mx-4 my-2 font-medium">Samudra Batara</span>
                  <a href="profile.php" class="block px-4 py-2 text-gray-700 hover:bg-gray-100"><i class="fas fa-user mr-2"></i>Profile</a>
                  <a href="settings.php" class="block px-4 py-2 text-gray-700 hover:bg-gray-100"><i class="fas fa-gear mr-2"></i>Settings</a>
                  <a href="logout.php" class="block px-4 py-2 text-gray-700 hover:bg-gray-100"><i class="fas fa-right-from-bracket mr-2"></i>Logout</a>
                </div>
            </div>
        </div>
    </header>
    
    <main class="pt-20">
        <!-- Pesan Pembuka -->
        <div class="bg-blue-600 text-white text-center p-8">
            <h1 class="text-4xl font-bold">Hasil Tes Kesehatan</h1>
            <p class="text-lg mt-4">Hasil ini didasarkan pada alat skrining berbasis bukti. Jika Anda merasa membutuhkan bantuan, silakan hubungi profesional kesehatan.</p>
        </div>
    
        <div class="p-10">
            <!-- Kategori Kondisi Mental -->
            <p class="text-center text-gray-800 font-medium text-xl mb-6">Respon Anda menunjukkan bahwa</p>
            <div class="flex items-center justify-center mb-6">
                <span class="<?= $warnaKategori; ?> text-white text-xl font-semibold rounded-full px-6 py-2">
                    <?= $kategori; ?>
                </span>
            </div>

    
            <!-- Skor dan Progress Bar -->
            <h2 class="text-center text-2xl font-bold text-gray-900 mb-8">Anda mendapatkan skor: <?= $skorTotal; ?></h2>
            <div class="w-full bg-gray-200 rounded-full h-4 mb-6">
                <div class="bg-blue-600 h-4 rounded-full" style="width: <?= min(100, ($skorTotal / 40) * 100); ?>%;"></div>
            </div>
            <div class="flex justify-between text-lg text-gray-600 mb-8">
                <span>Tidak terlalu (1-10)</span>
                <span>Kemungkinan (11-26)</span>
                <span>Sudah pasti (27-40)</span>
            </div>
    
            <!-- Deskripsi Hasil -->
            <p class="text-gray-700 text-lg mb-8"><?= htmlspecialchars($hasil['deskripsi']); ?></p>
    
            <!-- Langkah-Langkah yang Bisa Dilakukan -->
            <h3 class="text-gray-800 font-bold text-xl mb-4">Langkah-Langkah Selanjutnya:</h3>
            <ul class="list-disc list-inside text-gray-700 text-lg space-y-3 mb-8">
                <li><?= htmlspecialchars($hasil['rekomendasi']); ?></li>
            </ul>
    
            <!-- Tombol Langkah Selanjutnya -->
            <div class="flex justify-end mt-8">
                <button class="bg-blue-600 text-white text-lg px-6 py-3 rounded-lg hover:bg-blue-700 mr-3">Hubungi Profesional</button>
                <a href="reset.php" class="btn btn-primary"><button class="bg-blue-600 text-white text-lg px-6 py-3 rounded-lg hover:bg-blue-700">Mulai Ulang Tes</button></a>
            </div>
        </div>
    </main>
    <footer class="bg-gray-200/50 my-20 pt-10 pb-3">
            <!-- Copyright -->
            <div class="mt-8 text-center">
                <p class="text-sm text-gray-500">© 2024 HarmonEase. All Rights Reserved.</p>
            </div>
    </footer>
    <script>
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
    </script>
</body>
</html>

