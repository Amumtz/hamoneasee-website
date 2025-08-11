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
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="styles.css">
    <title>kategori Artikel</title>
</head>
<body>
    @include('user.partials.header')
    <div class="mt-28 ">
        <form class="max-w-md mx-auto mt-16">   
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 " placeholder="Search artikel..." required />
                <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 ">Search</button>
            </div>
        </form>
    </div>
    <div class="my-16 mx-20">
        <h2 class="text-xl font-bold mb-4">Artikel Strategi Self-Help dan Peningkatan Diri</h2>
        <div class="flex items-center space-x-4 mt-4">
            <div id="carousel" class="flex overflow-x-auto space-x-4 scrollbar-hide">
                <div class="relative flex-shrink-0 w-44"><a href="{{ route('user.artikel.detail') }}">

                    <img src="{{ asset('img/artikel1.png') }}" alt="" class="w-full h-32 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-xs mt-3 font-semibold">Meningkatkan Rasa Percaya Diri: Langkah-langkah Praktis</h3>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-44"><a href="#">
                    <img src="{{ asset('img/artikel2.png') }}" alt="" class="w-full h-32 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-xs mt-3 font-semibold">Meningkatkan Rasa Percaya Diri: Langkah-langkah Praktis</h3>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-44"><a href="#">
                    <img src="{{ asset('img/artikel3.png') }}" alt="" class="w-full h-32 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-xs mt-3 font-semibold">Meningkatkan Rasa Percaya Diri: Langkah-langkah Praktis</h3>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-44"><a href="#">
                    <img src="{{asset ('img/artikel (4).png') }}" alt="" class="w-full h-32 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-xs mt-3 font-semibold">Meningkatkan Rasa Percaya Diri: Langkah-langkah Praktis</h3>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-44"><a href="#">
                    <img src="{{asset ('img/artikel1.png') }}" alt="" class="w-full h-32 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-xs mt-3 font-semibold">Meningkatkan Rasa Percaya Diri: Langkah-langkah Praktis</h3>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-44"><a href="#">
                    <img src="{{asset('img/artikel3.png') }}" alt="" class="w-full h-32 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-xs mt-3 font-semibold">Meningkatkan Rasa Percaya Diri: Langkah-langkah Praktis</h3>
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="my-16 mx-20">
        <h2 class="text-xl font-bold mb-4">Artikel Gangguan Kesehatan Mental</h2>
        <div class="flex items-center space-x-4 mt-4">
            <div id="carousel" class="flex overflow-x-auto space-x-4 scrollbar-hide">
                <div class="relative flex-shrink-0 w-44"><a href="#">
                    <img src="{{asset ('img/artikel (3).png') }}" alt="" class="w-full h-32 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-xs mt-3 font-semibold">Meningkatkan Rasa Percaya Diri: Langkah-langkah Praktis</h3>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-44"><a href="#">
                    <img src="img/artikel (1).png" alt="" class="w-full h-32 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-xs mt-3 font-semibold">Mindfulness: Praktik Kesadaran untuk Kesehatan Mental dan Emosional</h3>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-44"><a href="#">
                    <img src="img/artikel (2).png" alt="" class="w-full h-32 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-xs mt-3 font-semibold">Menumbuhkan Rasa Syukur: Cara Meningkatkan Kepuasan Hidup</h3>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-44"><a href="#">
                    <img src="img/aertikel (5).png" alt="" class="w-full h-32 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-xs mt-3 font-semibold">7 Cara Menjaga Kesehatan Mental (Jiwa)</h3>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-44"><a href="#">
                    <img src="img/aertikel (2).png" alt="" class="w-full h-32 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-xs mt-3 font-semibold">Mengelola Stres dengan Latihan Fisik yang Teratur</h3>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-44"><a href="#">
                    <img src="img/artikel (3).png" alt="" class="w-full h-32 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-xs mt-3 font-semibold">Meningkatkan Rasa Percaya Diri: Langkah-langkah Praktis</h3>
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="my-16 mx-20">
        <h2 class="text-xl font-bold mb-4">Artikel Hubungan Sosial</h2>
        <div class="flex items-center space-x-4 mt-4">
            <div id="carousel" class="flex overflow-x-auto space-x-4 scrollbar-hide">
                <div class="relative flex-shrink-0 w-44"><a href="#">
                    <img src="img/aertikel (1).png" alt="" class="w-full h-32 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-xs mt-3 font-semibold">Menjaga Kesehatan Mental dalam Hubungan Interpersonal</h3>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-44"><a href="#">
                    <img src="img/aertikel (5).png" alt="" class="w-full h-32 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-xs mt-3 font-semibold">Kiat-kiat untuk Komunikasi Efektif dan Sehat</h3>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-44"><a href="#">
                    <img src="img/aertikel (6).png" alt="" class="w-full h-32 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-xs mt-3 font-semibold">Dampak Kesehatan Mental terhadap Hubungan Anda</h3>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-44"><a href="#">
                    <img src="img/artikel (2).png" alt="" class="w-full h-32 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-xs mt-3 font-semibold">Strategi Menghadapi Penolakan dan Membangun Ketahanan Diri</h3>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-44"><a href="#">
                    <img src="img/artikel (4).png" alt="" class="w-full h-32 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-xs mt-3 font-semibold">Pentingnya Dukungan Sosial untuk Kesehatan Mental</h3>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-44"><a href="#">
                    <img src="img/artikel3.png" alt="" class="w-full h-32 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-xs mt-3 font-semibold">Meningkatkan Rasa Percaya Diri: Langkah-langkah Praktis</h3>
                    </a>
                </div>
            </div>
        </div>
    </div>
      @include('user.partials.footer')
</body>
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