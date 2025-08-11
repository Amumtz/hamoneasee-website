<?php
session_start();
require_once('koneksi.php');
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Kategori Video</title>
</head>
<body>
    <header id="header-placeholder" class=" bg-white mt-0 shadow z-50">
      <script src="header.js"></script>
    </header>
    <div class="fixed bg-white w-full pb-3"> 
        <div class="flex mt-20 mx-96 h-8 rounded-md border border-slate-900">
            <input type="search" name="pencarian" id="pencarian" placeholder=" Search" class="ml-1 my-1 w-full">
            <i class="fa-solid fa-search mt-2 mr-2"></i>
        </div>
        <div class="mt-4 flex">
            <div class="ml-4 px-3 py-1 border rounded-md bg-white border-blue-300 hover:bg-blue-400 hover:text-white flex justify-center items-center cursor-pointer">
                <span>Semua</span>
            </div>
            <div class="ml-4 px-3 py-1 border rounded-md bg-white border-blue-300 hover:bg-blue-400 hover:text-white flex justify-center items-center cursor-pointer">
                <span>Baru diupload</span>
            </div>
            <div class="ml-4 px-3 py-1 border rounded-md bg-white border-blue-300 hover:bg-blue-400 hover:text-white flex justify-center items-center cursor-pointer">
                <span>Ditonton</span>
            </div>
            <div class="ml-4 px-3 py-1 border rounded-md bg-white border-blue-300 hover:bg-blue-400 hover:text-white flex justify-center items-center cursor-pointer">
                <span>Baru untuk Anda</span>
            </div>
        </div>
    </div>
    <main class="p-8">
        <div id="contentGrid" class="mt-36 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
          <!-- Card Template -->
          <div class="bg-white "><a href="video.php">
            <img src="external/thumbnailvideo (1).png" alt="Thumbnail" class="w-full h-44 rounded-lg sm:h-44 lg:h-44 object-cover">
            <div class="p-2">
              <h3 class="text-lg font-medium">How to Deal with Depression and Anxiety?</h3>
              <p class="text-gray-500 text-sm mt-2">00:00</p>
            </div></a>
          </div>
          <div class="bg-white">
            <img src="external/thumbnailvideo (10).png" alt="Thumbnail" class="w-full h-44 rounded-lg sm:h-44 lg:h-44 object-cover">
            <div class="p-2">
              <h3 class="text-lg font-medium">Pentingnya Menjaga Kesehatan Mental</h3>
              <p class="text-gray-500 text-sm mt-2">00:00</p>
            </div>
          </div>
          <div class="bg-white">
            <img src="external/thumbnailvideo (3).png" alt="Thumbnail" class="w-full h-44 rounded-lg sm:h-44 lg:h-44 object-cover">
            <div class="p-2">
              <h3 class="text-lg font-medium">Memahami Kondisi Gangguan Mental</h3>
              <p class="text-gray-500 text-sm mt-2">00:00</p>
            </div>
          </div>
          <div class="bg-white ">
            <img src="external/thumbnailvideo (5).png" alt="Thumbnail" class="w-full h-44 rounded-lg sm:h-44 lg:h-44 object-cover">
            <div class="p-2">
              <h3 class="text-lg font-medium">How to Deal with Depression and Anxiety?</h3>
              <p class="text-gray-500 text-sm mt-2">00:00</p>
            </div>
          </div>
          <div class="bg-white">
            <img src="external/thumbnailvideo (8).png" alt="Thumbnail" class="w-full h-44 rounded-lg sm:h-44 lg:h-44 object-cover">
            <div class="p-2">
              <h3 class="text-lg font-medium">Pentingnya Menjaga Kesehatan Mental</h3>
              <p class="text-gray-500 text-sm mt-2">00:00</p>
            </div>
          </div>
          <div class="bg-white">
            <img src="external/thumbnailvideo (14).jpeg" alt="Thumbnail" class="w-full h-44 rounded-lg sm:h-44 lg:h-44 object-cover">
            <div class="p-2">
              <h3 class="text-lg font-medium">Memahami Kondisi Gangguan Mental</h3>
              <p class="text-gray-500 text-sm mt-2">00:00</p>
            </div>
          </div>
          <div class="bg-white ">
            <img src="external/thumbnailvideo (16).jpeg" alt="Thumbnail" class="w-full h-44 rounded-lg sm:h-44 lg:h-44 object-cover">
            <div class="p-2">
              <h3 class="text-lg font-medium">How to Deal with Depression and Anxiety?</h3>
              <p class="text-gray-500 text-sm mt-2">00:00</p>
            </div>
          </div>
          <div class="bg-white">
            <img src="external/thumbnailvideo (2).png" alt="Thumbnail" class="w-full h-44 rounded-lg sm:h-44 lg:h-44 object-cover">
            <div class="p-2">
              <h3 class="text-lg font-medium">Pentingnya Menjaga Kesehatan Mental</h3>
              <p class="text-gray-500 text-sm mt-2">00:00</p>
            </div>
          </div>
          <div class="bg-white">
            <img src="external/thumbnailvideo (11).png" alt="Thumbnail" class="w-full h-44 rounded-lg sm:h-44 lg:h-44 object-cover">
            <div class="p-2">
              <h3 class="text-lg font-medium">Memahami Kondisi Gangguan Mental</h3>
              <p class="text-gray-500 text-sm mt-2">00:00</p>
            </div>
          </div>
        </div>
      </main>
      <footer class="bg-gray-100/50 my-20">
        <div class="container-fluid px-4 pt-5 lg:px-4">
            <!-- Logo dan Navigasi -->
            <div class="grid grid-cols-1 md:grid-cols-5 gap-2">
                <!-- Logo Perusahaan --> 
                <div class="col-span-1 md:col-span-1 mb-6 flex items-center">
                    <img src="img/logo.png" alt="Logo Perusahaan" class="w-16 h-16">
                    <h1 class="text-2xl ml-2 text-gray-900 font-medium text-center">HarmonEasee</h1>
                </div>
    
                <!-- Menu COMPANY -->
                <div class="col-span-1 ml-10 mb-6">
                    <h3 class="text-xl font-semibold mb-4">Company</h3>
                    <ul class="space-y-2">
                        <li><a href="aboutus.php" class="text-gray-400 hover:text-gray-700">About Us</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-gray-700">Careers</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-gray-700">Our Story</a></li>
                    </ul>
                </div>
    
                <!-- Menu Service -->
                <div class="col-span-1 mb-6">
                    <h3 class="text-xl font-semibold mb-4">Services</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-gray-700">Consulting</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-gray-700">Support</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-gray-700">Custom Solutions</a></li>
                    </ul>
                </div>
    
                <!-- Menu Resources -->
                <div class="col-span-1 mb-6">
                    <h3 class="text-xl font-semibold mb-4">Resources</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-gray-700">Blog</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-gray-700">Guides</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-gray-700">FAQs</a></li>
                    </ul>
                </div>
    
                <!-- Social Media Icons -->
                <div class="col-span-1 mb-6 flex flex-col items-start">
                    <h3 class="text-xl font-semibold mb-4">Follow Us</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-gray-900">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-gray-900">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-gray-900">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-gray-900">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
    
            <!-- Copyright -->
            <div class="mt-8 text-center">
                <p class="text-sm text-gray-500">© 2024 HarmonEase. All Rights Reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>