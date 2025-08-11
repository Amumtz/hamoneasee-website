<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori Tes</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css"> <!-- File CSS kamu -->
</head>
<body>
    <header id="header-placeholder" class=" bg-white mt-0 shadow z-50">
        <script src="header.js"></script>
    </header>
 @include('user.partials.header')

    <div class="container mt-5 pt-5">
        <h1 class="text-center text-4xl text-primary">Kategori Tes</h1>
        <div class="row mt-4">
            <!-- Baris pertama -->
            <div class="col-md-4 my-3"><a href="soaltes1.php">
                <div class="card shadow-sm test-category-card">
                    <div class="card-header text-white bg-primary">
                        Tes Kecemasan
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            Tes ini menilai tingkat kecemasan dan gejala yang terkait, seperti rasa khawatir berlebihan, ketegangan otot, dan kesulitan berkonsentrasi. Ini dapat membantu Anda memahami kondisi kecemasan Anda dan menemukan cara untuk mengatasinya.
                        </p>
                    </div>
                </div></a>
            </div>
            <div class="col-md-4 my-3">
                <div class="card shadow-sm test-category-card">
                    <div class="card-header text-white bg-primary">
                        Tes Depresi
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            Tes ini mengukur tingkat gejala depresi, seperti perasaan sedih yang mendalam, kehilangan minat dalam aktivitas, perubahan pola tidur, dan nafsu makan. Hasilnya dapat memberikan wawasan tentang kondisi Anda dan membantu dalam mencari bantuan lebih lanjut.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 my-3">
                <div class="card shadow-sm test-category-card">
                    <div class="card-header text-white bg-primary">
                        Tes Stres
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            Tes ini mengevaluasi tingkat stres Anda dan dampaknya terhadap kesejahteraan fisik dan mental Anda. Dengan mengetahui tingkat stres, Anda dapat mengambil langkah-langkah untuk mengelola dan mengurangi stres.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <!-- Baris kedua -->
            <div class="col-md-4 my-3">
                <div class="card shadow-sm test-category-card">
                    <div class="card-header text-white bg-primary">
                        Tes Kesehatan Mental
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            Tes ini mengevaluasi kesejahteraan mental secara keseluruhan, termasuk kebahagiaan, kepuasan hidup, dan hubungan sosial. Hasilnya dapat memberikan gambaran umum tentang kesehatan mental Anda.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 my-3">
                <div class="card shadow-sm test-category-card">
                    <div class="card-header text-white bg-primary">
                        Tes Self-Esteem
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            Tes ini mengukur tingkat harga diri dan persepsi terhadap citra tubuh. Ini sangat relevan bagi Gen Z yang sering terpapar media sosial dan bisa membantu meningkatkan kesadaran akan pentingnya penerimaan diri.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 my-3">
                <div class="card shadow-sm test-category-card">
                    <div class="card-header text-white bg-primary">
                        Tes Gangguan Makan
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            Tes ini menilai adanya gejala gangguan makan, seperti anoreksia, bulimia, dan gangguan makan berlebihan. Ini membantu mengidentifikasi masalah makan yang mungkin memerlukan perhatian medis atau terapi.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
