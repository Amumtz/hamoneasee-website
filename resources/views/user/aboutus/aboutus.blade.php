
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - HarmonEasee</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styleabout.css">
</head>
<body class="bg-gray-50 text-gray-800">
    <header id="header-placeholder" class=" bg-white mt-0 shadow z-50">
        <script src="header.js"></script>
    </header>
    
    <section class="relative bg-black mt-16">
        <!-- Video Background -->
        <video autoplay muted loop class="absolute inset-0 w-full h-full object-cover">
            <source src="img/tron.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        
        <!-- Overlay Content -->
        <div class="relative bg-black bg-opacity-50 flex items-center justify-center h-full">
            <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56">
                <h1 class="text-white text-5xl font-bold text-center px-3 mt-4 max-w-2xl">About Us</h1>
            </div>
        </div>
    </section>
    
    <section class="py-12">
        <div class="container mx-auto px-4">
            <div class="text-center mb-10 py-10">
                <h2 class="text-3xl font-bold text-sky-500">Welcome to HarmonEasee</h2>
                <p class="mt-4 text-xl text-gray-600 px-20">
                    HarmonEasee merupakan aplikasi kesehatan mental yang hadir sebagai solusi inovatif untuk mendukung kesehatan mental generasi Z di era modern. Di tengah tekanan teknologi dan media sosial, aplikasi ini menawarkan akses mudah ke sumber daya kesehatan mental, fitur interaktif, dan komunitas yang mendukung. Dengan HarmonEasee, kami menciptakan ruang aman bagi pengguna untuk meningkatkan kesejahteraan psikologis mereka.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-32 mb-16 items-center">
                <div>
                    <img src="img/aboutus(1).jpg" alt="About HarmonEasee" class="rounded-lg shadow-lg h-3/5">
                </div>
                <div>
                    <h3 class="text-2xl font-bold text-gray-800">Our Vision</h3>
                    <p class="mt-4 text-gray-600">
                        Visi kami adalah menciptakan ruang yang aman dan mudah diakses bagi generasi Z untuk mendukung kesehatan mental mereka, memberikan sumber daya yang dibutuhkan, dan membangun komunitas yang saling mendukung, guna meningkatkan kesejahteraan psikologis secara keseluruhan.
                    </p>

                    <h3 class="text-2xl font-bold text-gray-800 mt-6">Why HarmonEasee?</h3>
                    <ul class="mt-4 list-disc list-item ml-4 text-gray-600">
                        <li>Akses gratis ke meditasi, sumber daya edukasi, dan tes kesehatan mental.</li>
                        <li>Konseling virtual yang terjangkau dengan proses pemesanan dan pembayaran yang sederhana.</li>
                        <li>Rekomendasi wisata pribadi untuk relaksasi dan pemulihan.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-gray-100 pt-24 pb-20">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl text-sky-500 font-bold">Our Team</h2>
            <p class="mt-4 text-gray-600">Temui para anggota tim penuh semangat di balik terciptanya HarmonEasee</p>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mt-10">
                <!-- Team Member 1 -->
                <div class="team-card relative bg-[#e5eff1] shadow-lg rounded-lg p-6 group">
                    <img src="img/team (2).png" alt="Team Member" class="w-56 h-56 mx-auto">
                    <div class="hover-overlay absolute inset-0 bg-black bg-opacity-60 rounded-lg flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                        <div class="flex space-x-4">
                            <a href="https://www.instagram.com/fadl.iikmal?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" class="text-white hover:text-gray-400">
                                <i class="fab fa-instagram text-2xl"></i>
                            </a>
                            <a href="#" class="text-white hover:text-gray-400">
                                <i class="fab fa-twitter text-2xl"></i>
                            </a>
                            <a href="#" class="text-white hover:text-gray-400">
                                <i class="fab fa-github text-2xl"></i>
                            </a>
                        </div>
                    </div>
                </div>
            
                <!-- Team Member 2 -->
                <div class="team-card relative bg-[#e5eff1] shadow-lg rounded-lg p-6 group">
                    <img src="img/team (1).png" alt="Team Member" class="w-56 h-56 mx-auto">
                    <div class="hover-overlay absolute inset-0 bg-black bg-opacity-60 rounded-lg flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                        <div class="flex space-x-4">
                            <a href="https://www.instagram.com/amtzh?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" class="text-white hover:text-gray-400">
                                <i class="fab fa-instagram text-2xl"></i>
                            </a>
                            <a href="#" class="text-white hover:text-gray-400">
                                <i class="fab fa-twitter text-2xl"></i>
                            </a>
                            <a href="#" class="text-white hover:text-gray-400">
                                <i class="fab fa-github text-2xl"></i>
                            </a>
                        </div>
                    </div>
                </div>
            
                <!-- Team Member 3 -->
                <div class="team-card relative bg-[#e5eff1] shadow-lg rounded-lg p-6 group">
                    <img src="img/team (4).png" alt="Team Member" class="w-56 h-56 mx-auto">
                    <div class="hover-overlay absolute inset-0 bg-black bg-opacity-60 rounded-lg flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                        <div class="flex space-x-4">
                            <a href="https://www.instagram.com/cennnnnn._?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" class="text-white hover:text-gray-400">
                                <i class="fab fa-instagram text-2xl"></i>
                            </a>
                            <a href="#" class="text-white hover:text-gray-400">
                                <i class="fab fa-twitter text-2xl"></i>
                            </a>
                            <a href="#" class="text-white hover:text-gray-400">
                                <i class="fab fa-github text-2xl"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-gray-100/50 my-20 pt-0">
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
    
    
    
    <!-- Link ke Font Awesome untuk ikon media sosial -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
