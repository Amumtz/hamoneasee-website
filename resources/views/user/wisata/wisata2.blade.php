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
    <title>Labuan Bajo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
         @include('user.partials.header')
    <div class="relative bg-cover bg-center min-h-screen mt-10" style="background-image: url('{{ asset('img/LABUANBAJO.jpeg')}}')">
        <div class="absolute inset-0 bg-black bg-opacity-40"></div>
        <div class="grid grid-cols-1 xl:grid-cols-2 relative max-w-7xl mx-auto px-6 lg:px-12 py-12 text-white">
            <!-- Judul -->
            
            <!-- Deskripsi -->
            <div class="mr-1">
                <h1 class="text-4xl font-bold mb-4">Labuan Bajo</h1>
                <p class="flex items-center text-lg mb-6">
                    <i class="fas fa-location-dot mr-2"></i>
                    Kabupaten Manggarai Barat, NTT
                </p>
                <p class="text-lg leading-relaxed mb-4">
                    Labuan Bajo merupakan pintu gerbang ke Taman Nasional Komodo, rumah bagi komodo, spesies kadal terbesar di dunia. Dikenal sebagai pintu gerbang menuju Taman Nasional Komodo, Labuan Bajo memikat wisatawan dengan pesona pantainya yang berpasir putih, air laut yang jernih, serta terumbu karang yang kaya akan kehidupan laut. 
                </p>
                <p class="text-lg leading-relaxed">
                    Labuan Bajo bukan hanya tempat untuk berlibur, tetapi juga destinasi yang dapat membantu menyegarkan pikiran, meremajakan tubuh, dan memperbaiki kesehatan mental dengan keindahan alamnya yang menenangkan dan aktivitas yang mendukung kesejahteraan
                </p>
            </div>
            <!-- Galeri -->
            <div class="relative pl-20">
                <div class="grid grid-cols-3 gap-1 my-8 m-5">
                    <img src="{{ asset('img/LABUANBAJO.jpeg')}}" alt="Gambar 1" class="w-32 h-44 object-cover rounded-lg">
                    <img src="{{ asset('img/LABUANBAJO1.jpeg')}}" alt="Gambar 2" class="w-32 h-44 object-cover rounded-lg">
                    <img src="{{ asset('img/LABUANBAJO2.jpeg')}}" alt="Gambar 3" class="w-32 h-44 object-cover rounded-lg">
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
                    <div class="relative flex-shrink-0 w-56 cursor-pointer"><a href="{{ route('wisata.wisata1')}}">
                        <div class="absolute inset-0 bg-slate-100 bg-opacity-60 rounded-lg"></div>
                        <img src="{{ asset('img/KARIMUNJAWA.jpg')}}" alt="" class="w-full h-40 object-cover rounded-lg">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/50 to-transparent p-4 rounded-b-lg">
                            <h3 class="text-white font-bold">Karimun Jawa</h3>
                            <p class="text-white text-sm">Kabupaten Jepara, Jawa Tengah</p>
                        </div></a>
                    </div>
                    <div class="relative flex-shrink-0 w-56 cursor-pointer"><a href="{{ route('wisata.wisata2')}}">
                        <img src="{{ asset('img/LABUANBAJO.jpeg')}}" alt="" class="w-full h-40 object-cover rounded-lg">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/50 to-transparent p-4 rounded-b-lg">
                            <h3 class="text-white font-bold">Labuan Bajo</h3>
                            <p class="text-white text-sm">Kabupaten Manggarai Barat, NTT</p>
                        </div></a>
                    </div>
                    <div class="relative flex-shrink-0 w-56 cursor-pointer"><a href="{{ route('wisata.wisata3')}}">
                        <div class="absolute inset-0 bg-slate-100 bg-opacity-60 rounded-lg"></div>
                        <img src="{{ asset('img/Banda Neira,.jpeg')}}" alt="" class="w-full h-40 object-cover rounded-lg">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/50 to-transparent p-4 rounded-b-lg">
                            <h3 class="text-white font-bold">Banda Neira</h3>
                            <p class="text-white text-sm">Kabupaten Maluku Tengah, Maluku</p>
                        </div></a>
                    </div>
                    <div class="relative flex-shrink-0 w-56 cursor-pointer">
                        <div class="absolute inset-0 bg-slate-100 bg-opacity-60 rounded-lg"></div>
                        <img src="{{ asset('img/Taman safari.jpeg')}}" alt="" class="w-full h-40 object-cover rounded-lg">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/50 to-transparent p-4 rounded-b-lg">
                            <h3 class="text-white font-bold">Taman Safari Indonesia</h3>
                            <p class="text-white text-sm">Kabupaten Bogor, Jawa Barat</p>
                        </div>
                    </div>
                    <div class="relative flex-shrink-0 w-56 cursor-pointer">
                        <div class="absolute inset-0 bg-slate-100 bg-opacity-60 rounded-lg"></div>
                        <img src="{{ asset('img/Terasering Panyaweuyan.jpeg')}}" alt="" class="w-full h-40 object-cover rounded-lg">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/50 to-transparent p-4 rounded-b-lg">
                            <h3 class="text-white font-bold">Terasering Panyaweuyan</h3>
                            <p class="text-white text-sm">Kabupaten Majalengka, Jawa Barat</p>
                        </div>
                    </div>
                    <div class="relative flex-shrink-0 w-56 cursor-pointer">
                        <div class="absolute inset-0 bg-slate-100 bg-opacity-60 rounded-lg"></div>
                        <img src="{{ asset('img/KAWAHIJEN.jpeg')}}" alt="" class="w-full h-40 object-cover rounded-lg">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/50 to-transparent p-4 rounded-b-lg">
                            <h3 class="text-white font-bold">Kawah Ijen</h3>
                            <p class="text-white text-sm">Kabupaten Banyuwangi, Jawa Timur</p>
                        </div>
                    </div>
                    <div class="relative flex-shrink-0 w-56 cursor-pointer">
                        <div class="absolute inset-0 bg-slate-100 bg-opacity-60 rounded-lg"></div>
                        <img src="{{ asset('img/TMII.jpeg')}}" alt="" class="w-full h-40 object-cover rounded-lg">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/50 to-transparent p-4 rounded-b-lg">
                            <h3 class="text-white font-bold">Taman Mini Indonesia Indah</h3>
                            <p class="text-white text-sm">Kota Jakarta Timur, DKI Jakarta</p>
                        </div>
                    </div>
                    <div class="relative flex-shrink-0 w-56 cursor-pointer">
                        <div class="absolute inset-0 bg-slate-100 bg-opacity-60 rounded-lg"></div>
                        <img src="{{ asset('img/De Djawatan.jpeg')}}" alt="" class="w-full h-40 object-cover rounded-lg">
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