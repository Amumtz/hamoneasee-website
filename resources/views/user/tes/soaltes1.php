<?php
session_start();
require_once('koneksi.php');

// Cek jika pengguna belum login
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

// Ambil ID soal dari parameter GET, default ke 1 jika tidak ada
$idSoal = isset($_GET['id_soal']) ? (int)$_GET['id_soal'] : 1;

// Ambil pertanyaan dari database
$sqlSoal = "SELECT * FROM soal WHERE id = ?";
$stmtSoal = mysqli_prepare($conn, $sqlSoal);
mysqli_stmt_bind_param($stmtSoal, "i", $idSoal);
mysqli_stmt_execute($stmtSoal);
$resultSoal = mysqli_stmt_get_result($stmtSoal);
$soal = mysqli_fetch_assoc($resultSoal);

// Redirect jika soal tidak ditemukan
if (!$soal) {
    header("Location: hasil.php"); // Arahkan ke halaman hasil jika tes selesai
    exit();
}

// Ambil opsi jawaban dari database
$sqlOpsi = "SELECT * FROM opsi WHERE id_soal = ?";
$stmtOpsi = mysqli_prepare($conn, $sqlOpsi);
mysqli_stmt_bind_param($stmtOpsi, "i", $idSoal);
mysqli_stmt_execute($stmtOpsi);
$resultOpsi = mysqli_stmt_get_result($stmtOpsi);
$opsi = [];
while ($row = mysqli_fetch_assoc($resultOpsi)) {
    $opsi[] = $row;
}

// Hitung total soal
$sqlTotalSoal = "SELECT COUNT(*) AS total FROM soal";
$resultTotalSoal = mysqli_query($conn, $sqlTotalSoal);
$totalSoal = mysqli_fetch_assoc($resultTotalSoal)['total'];

// Tentukan soal sebelumnya dan berikutnya
$soalSebelumnya = $idSoal > 1 ? $idSoal - 1 : 1;
$soalBerikutnya = $idSoal < $totalSoal ? $idSoal + 1 : $idSoal;

// Simpan skor jika ada POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idSoal = (int)$_POST['id_soal'];
    $skor = (int)$_POST['skor'];

    // Simpan skor ke sesi (atau database jika diperlukan)
    $_SESSION['jawaban'][$idSoal] = $skor;

    // Redirect ke soal berikutnya
    header("Location: ?id_soal=$soalBerikutnya");
    exit();
}

// Ambil skor yang disimpan untuk soal ini
$skorTersimpan = isset($_SESSION['jawaban'][$idSoal]) ? $_SESSION['jawaban'][$idSoal] : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey Question</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background-color: #f0f8ff;
        }
        .card {
            border: none;
            border-radius: 10px;
        }
        .progress-bar {
            background-color: #007bff;
        }
        .btn-option {
            border: 1px solid #007bff;
            color: #007bff;
            border-radius: 20px;
            font-weight: bold;
        }
        .btn-option:hover {
            background-color: #007bff;
            color: white;
        }
        .btn-next {
              display: flex;
              justify-content: space-between;
              align-items: center;
         }
         .btn-next .arrow {
              margin-left: 8px;
         }
    </style>
</head>
<body>
    <header class="fixed-top bg-white z-50 shadow-sm">
        <div class="container-fluid px-4 py-3">
            <div class="d-flex justify-content-between align-items-center">
                <!-- Back Button and Breadcrumb -->
                <div class="d-flex align-items-center">
                    <div class="border rounded shadow-sm me-3 d-flex justify-content-center align-items-center" style="width: 40px; height: 40px;">
                        <button id="backButton" class="btn btn-link text-dark p-0">
                            <i class="fas fa-arrow-left"></i>
                        </button>
                    </div>
                    <nav class="breadcrumb mb-0">
                        <a href="index.php" class="breadcrumb-item text-muted">Home</a>
                        <a href="teskesehatan.php" class="breadcrumb-item text-dark">Kategori Tes</a>
                        <a href="soaltes1.php" class="breadcrumb-item text-dark active" aria-current="page">Tes Kesehatan</a>
                    </nav>
                </div>

                <!-- Profile and Menu -->
                <div class="d-flex align-items-center ">
                    <div class="border rounded-circle bg-light d-flex justify-content-center align-items-center mx-2" style="width: 40px; height: 40px;">
                        <button class="btn btn-link text-dark p-0">
                          <img src="external/vectori344-knem.svg" alt="" style="width: 24px; height: 24px;">
                        </button>
                    </div>
                    <div class="dropdown">
                        <img src="external/ellipse23437-cpab-200h.png" alt="Profile" class="rounded-circle" style="width: 40px; height: 40px; cursor: pointer;" id="profileImage">
                        <ul class="dropdown-menu dropdown-menu-start mt-3" aria-labelledby="profileImage">
                            <li>
                                <span class="dropdown-item-text fw-bold">Samudra Batara</span>
                            </li>
                            <li>
                                <a href="profile.php" class="dropdown-item"><i class="fas fa-user me-2"></i>Profile</a>
                            </li>
                            <li>
                                <a href="settings.php" class="dropdown-item"><i class="fas fa-gear me-2"></i>Settings</a>
                            </li>
                            <li>
                                <a href="logout.php" class="dropdown-item"><i class="fas fa-right-from-bracket me-2"></i>Logout</a>
                            </li>
                        </ul>
                    </div>              
                </div>
            </div>
        </div>
    </header>
    <div class="container d-flex justify-content-center align-items-center min-vh-100 mt-5 py-5">
        <div class="card shadow p-4" style="width: 500px;">
            <div class="mb-3">
                <h5 class="text-center">Test Questions</h5>
                <div class="d-flex justify-content-between align-items-center">
                    <span>Pertanyaan <?= $idSoal ?></span>
                    <span><?= $idSoal ?> dari <?= $totalSoal ?></span>
                </div>
            </div>
            <hr>
            <div class="mb-4">
                <h6 class="text-center"><?= htmlspecialchars($soal['pertanyaan']) ?></h6>
            </div>
            <form action="proses_jawaban.php" method="POST" class="d-grid gap-3">
                <input type="hidden" name="id_soal" value="<?= $idSoal ?>">
                <?php foreach ($opsi as $item): ?>
                    <button type="submit" name="skor" value="<?= $item['skor'] ?>" class="btn btn-option <?= $skorTersimpan == $item['skor'] ? 'bg-primary text-white' : '' ?>">
                        <?= htmlspecialchars($item['jawaban']) ?>
                    </button>
                <?php endforeach; ?>
            </form>
            <div class="d-flex align-items-center mb-3">
                <div class="progress flex-grow-1" style="height: 8px;">
                    <div class="progress-bar" role="progressbar" style="width: <?= ($idSoal / $totalSoal) * 100 ?>%;"></div>
                </div>
                <span class="ms-3"><?= $idSoal ?> dari <?= $totalSoal ?></span>
            </div>
            <!-- Link ke halaman soaltes2.html -->
            <div class="d-flex justify-content-between">
                <?php if ($idSoal > 1): ?>
                    <div class="text-start mt-3">
                        <a href="?id_soal=<?= $soalSebelumnya ?>" class="btn btn-link text-decoration-none btn-next">← Soal Sebelumnya</a>
                    </div>
                <?php endif; ?>
                <?php if ($idSoal < $totalSoal): ?>
                    <a href="?id_soal=<?= $soalBerikutnya ?>" class="btn btn-link text-decoration-none btn-next">Soal Berikutnya →</a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Popper.js (Required for Bootstrap Dropdowns) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const profileImage = document.getElementById('profileImage');
            const dropdownMenu = document.querySelector('.dropdown-menu');

            profileImage.addEventListener('click', function () {
                // Toggle visibility
                dropdownMenu.classList.toggle('show');

                // Adjust position if necessary
                const rect = dropdownMenu.getBoundingClientRect();
                if (rect.right > window.innerWidth) {
                    dropdownMenu.style.left = 'auto';
                    dropdownMenu.style.right = '0'; // Menempel ke tepi kanan layar
                }
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', function (event) {
                if (!profileImage.contains(event.target) && !dropdownMenu.contains(event.target)) {
                    dropdownMenu.classList.remove('show');
                }
            });
            const backButton = document.getElementById("backButton");
            backButton.addEventListener("click", function (event) {
                 event.preventDefault();
                 const userConfirmed = confirm("Apakah Anda yakin ingin kembali? Semua jawaban yang belum disimpan akan hilang.");
                 if (userConfirmed) {
                      window.history.back();
                 }
            });
        });
    </script>
    
</body>
</html>
