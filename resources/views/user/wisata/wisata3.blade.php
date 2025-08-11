@extends('user.layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Banda Neira</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
     @include('user.partials.header')
    <div class="relative bg-cover bg-center min-h-screen mt-10" style="background-image: url('img/Banda\ Neira\,.jpeg')">
        <div class="absolute inset-0 bg-black bg-opacity-40"></div>
        <div class="grid grid-cols-1 xl:grid-cols-2 relative max-w-7xl mx-auto px-6 lg:px-12 py-12 text-white">
            <!-- Judul -->
            
            <!-- Deskripsi -->
            <div class="mr-1">
                <h1 class="text-4xl font-bold mb-4">Banda Neira</h1>
                <p class="flex items-center text-lg mb-6">
                    <i class="fas fa-location-dot mr-2"></i>
                    Kabupaten Maluku Tengah, Maluku
                </p>
                <p class="text-lg leading-relaxed mb-8">
                    Banda Neira, salah satu permata tersembunyi di Kepulauan Banda, Maluku, adalah destinasi yang kaya akan sejarah dan keindahan alam. Sebagai pusat perdagangan pala di masa lalu, pulau ini menyimpan warisan berharga berupa benteng-benteng kuno, rumah kolonial bergaya Eropa, dan tradisi lokal yang masih terjaga. Selain nilai sejarahnya, Banda Neira dikelilingi oleh laut biru jernih, terumbu karang yang memikat, serta lanskap Gunung Api Banda yang megah, menawarkan panorama yang menenangkan jiwa dan memikat hati.
                </p>
                <p class="text-lg leading-relaxed">
                    Dengan suasana yang tenang dan jauh dari hiruk-pikuk perkotaan, Banda Neira menjadi tempat yang sempurna untuk menyegarkan pikiran dan meningkatkan kesejahteraan mental. Aktivitas seperti snorkeling di bawah laut yang kaya kehidupan, mendaki Gunung Api Banda, atau sekadar menikmati angin laut di tepi pantai mampu memberikan ketenangan batin dan energi positif. Pulau ini bukan hanya sekadar destinasi wisata, tetapi juga ruang refleksi diri dan pelarian ideal untuk meremajakan tubuh dan pikiran melalui harmoni antara sejarah dan keindahan alam.
                </p>
            </div>
            <!-- Galeri -->
            <div class="relative pl-20">
                <div class="grid grid-cols-3 gap-1 my-8 m-5">
                    <img src="img/bandaneira (1).jpeg" alt="Gambar 1" class="w-32 h-44 object-cover rounded-lg">
                    <img src="img/bandaneira (2).jpeg" alt="Gambar 2" class="w-32 h-44 object-cover rounded-lg">
                    <img src="img/Banda Neira,.jpeg" alt="Gambar 3" class="w-32 h-44 object-cover rounded-lg">
                  </div>
            </div>
        </div>
        <div class="mb-5 mr-20 ml-10">
              <div class="flex items-center space-x-4 ">
                <button id="prevBtn" class="absolute left-0 text-gray-500 hover:text-gray-700 z-10" onclick="scrollCarousel(-1)">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <div id="carousel" class="flex overflow-x-auto space-x-3 scrollbar-hide">
                    <div class="relative flex-shrink-0 w-44 cursor-pointer"><a href="{{ route('wisata.wisata1')}}">
                        <div class="absolute inset-0 bg-slate-100 bg-opacity-60 rounded-lg"></div>
                        <img src="img/KARIMUNJAWA.jpg" alt="" class="w-full h-40 object-cover rounded-lg">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/50 to-transparent p-4 rounded-b-lg">
                            <h3 class="text-white font-bold">Karimun Jawa</h3>
                            <p class="text-white text-sm">Kabupaten Jepara, Jawa Tengah</p>
                        </div></a>
                    </div>
                    <div class="relative flex-shrink-0 w-44 cursor-pointer"><a href="{{ route('wisata.wisata2')}}">
                        <div class="absolute inset-0 bg-slate-100 bg-opacity-60 rounded-lg"></div>
                        <img src="img/LABUANBAJO.jpeg" alt="" class="w-full h-40 object-cover rounded-lg">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/50 to-transparent p-4 rounded-b-lg">
                            <h3 class="text-white font-bold">Labuan Bajo</h3>
                            <p class="text-white text-sm">Kabupaten Manggarai Barat, NTT</p>
                        </div></a>
                    </div>
                    <div class="relative flex-shrink-0 w-56 cursor-pointer">
                        <img src="img/Banda Neira,.jpeg" alt="" class="w-full h-40 object-cover rounded-lg">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/50 to-transparent p-4 rounded-b-lg">
                            <h3 class="text-white font-bold">Banda Neira</h3>
                            <p class="text-white text-sm">Kabupaten Maluku Tengah, Maluku</p>
                        </div>
                    </div>
                    <div class="relative flex-shrink-0 w-44 cursor-pointer"><a href="wisata4.php">
                        <div class="absolute inset-0 bg-slate-100 bg-opacity-60 rounded-lg"></div>
                        <img src="img/Taman safari.jpeg" alt="" class="w-full h-40 object-cover rounded-lg">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/50 to-transparent p-4 rounded-b-lg">
                            <h3 class="text-white font-bold">Taman Safari Indonesia</h3>
                            <p class="text-white text-sm">Kabupaten Bogor, Jawa Barat</p>
                        </div></a>
                    </div>
                    <div class="relative flex-shrink-0 w-44 cursor-pointer">
                        <div class="absolute inset-0 bg-slate-100 bg-opacity-60 rounded-lg"></div>
                        <img src="img/Terasering Panyaweuyan.jpeg" alt="" class="w-full h-40 object-cover rounded-lg">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/50 to-transparent p-4 rounded-b-lg">
                            <h3 class="text-white font-bold">Terasering Panyaweuyan</h3>
                            <p class="text-white text-sm">Kabupaten Majalengka, Jawa Barat</p>
                        </div>
                    </div>
                    <div class="relative flex-shrink-0 w-44 cursor-pointer">
                        <div class="absolute inset-0 bg-slate-100 bg-opacity-60 rounded-lg"></div>
                        <img src="img/KAWAHIJEN.jpeg" alt="" class="w-full h-40 object-cover rounded-lg">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/50 to-transparent p-4 rounded-b-lg">
                            <h3 class="text-white font-bold">Kawah Ijen</h3>
                            <p class="text-white text-sm">Kabupaten Banyuwangi, Jawa Timur</p>
                        </div>
                    </div>
                    <div class="relative flex-shrink-0 w-44 cursor-pointer">
                        <div class="absolute inset-0 bg-slate-100 bg-opacity-60 rounded-lg"></div>
                        <img src="img/TMII.jpeg" alt="" class="w-full h-40 object-cover rounded-lg">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/50 to-transparent p-4 rounded-b-lg">
                            <h3 class="text-white font-bold">Taman Mini Indonesia Indah</h3>
                            <p class="text-white text-sm">Kota Jakarta Timur, DKI Jakarta</p>
                        </div>
                    </div>
                    <div class="relative flex-shrink-0 w-44 cursor-pointer">
                        <div class="absolute inset-0 bg-slate-100 bg-opacity-60 rounded-lg"></div>
                        <img src="img/De Djawatan.jpeg" alt="" class="w-full h-40 object-cover rounded-lg">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/50 to-transparent p-4 rounded-b-lg">
                            <h3 class="text-white font-bold">De Djawatan</h3>
                            <p class="text-white text-sm">Kabupaten Banyuwangi, Jawa Timur</p>
                        </div>
                    </div>
                    <button id="nextBtn" class="absolute right-0 text-gray-500 hover:text-gray-700 z-3 mt-20 mr-5" onclick="scrollCarousel(1)">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    const scrollCarousel = (direction) => {
      const carousel = document.getElementById('carousel');
      const scrollAmount = 300; // Jarak scroll
      carousel.scrollBy({
        left: direction * scrollAmount,
        behavior: 'smooth',
      });
    };
  </script>
  
  <!-- Tambahkan style untuk sembunyikan scrollbar -->
  <style>
    .scrollbar-hide::-webkit-scrollbar {
      display: none;
    }
    .scrollbar-hide {
      -ms-overflow-style: none; /* Internet Explorer 10+ */
      scrollbar-width: none; /* Firefox */
    }
  </style>
</html>