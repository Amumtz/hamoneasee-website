@extends('user.layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <title>Ruang Edukasi</title>
</head>
<body>
    @include('user.partials.header')
    <div class="text-center mt-32 mx-44">
        <h1 class="text-3xl font-extrabold text-[#1A74A0]">Ruang Edukasi</h1>
        <p class="mt-8 text-wrap text-lg font-medium text-gray-600 md:font-normal md:text-balance">Selamat datang di Ruang Edukasi, tempat terbaik untuk memperkaya wawasan dan menjaga kesehatan mental Anda. Dalam aplikasi HarmonEasee, kami menyediakan berbagai sumber daya untuk membantu Anda memahami, mengelola, dan merawat kesehatan mental dengan lebih baik.</p>
    </div>
    <div id="artikel" class="mt-32 mx-10">
        <div class="flex items-center justify-between">
            <h4 class="text-lg font-bold text-[#1A74A0] ">Artikel</h4>
            <p class="text-right text-[#339af0]"><a href="{{ url('user/artikel/10') }}">Selanjutnya</a></p>
        </div>
        <div class="flex items-center space-x-4 mt-4">
            <div id="carousel" class="flex overflow-x-auto space-x-4 scrollbar-hide">
                <div class="relative flex-shrink-0 w-48"><a href="{{ url('user/artikel/10') }}">
                    <img src="{{asset ('img/artikel (4).png') }}" alt="" class="w-full h-32 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-xs mt-3 font-reguler">Meningkatkan Rasa Percaya Diri: Langkah-langkah Praktis</h3>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-48"><a href="{{ url('user/artikel/11') }}">
                    <img src="{{asset ('img/artikel (2).png') }}" alt="" class="w-full h-32 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-xs mt-3 font-reguler">Menumbuhkan Rasa Syukur: Cara Meningkatkan Kepuasan Hidup</h3>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-48"><a href="#">
                    <img src="{{asset ('img/artikel (3).png') }}" alt="" class="w-full h-32 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-xs mt-3 font-reguler">Strategi Menghadapi Penolakan dan Membangun Ketahanan Diri</h3>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-48"><a href="#">
                    <img src="{{asset ('img/artikel (1).png') }}" alt="" class="w-full h-32 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-xs mt-3 font-reguler">Mengelola Stres dengan Latihan Fisik yang Teratur</h3>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-48"><a href="#">
                    <img src="{{asset ('img/artikel (4).png') }}" alt="" class="w-full h-32 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-xs mt-3 font-reguler">Dampak Kesehatan Mental terhadap Hubungan Anda</h3>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-48"><a href="#">
                    <img src="{{asset ('img/artikel (2).png') }}" alt="" class="w-full h-32 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-xs mt-3 font-reguler">Menumbuhkan Rasa Syukur: Cara Meningkatkan Kepuasan Hidup</h3>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-48"><a href="#">
                    <img src="{{asset ('img/artikel (1).png') }}" alt="" class="w-full h-32 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-xs mt-3 font-reguler">Menjaga Kesehatan Mental dalam Hubungan Interpersonal</h3>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-28 mx-10">
        <div class="flex items-center justify-between">
            <h4 class="text-lg font-bold text-[#1A74A0]">Video</h4>
            <p class="text-right text-[#339af0]"><a href="{{ route('user.video') }}">Selanjutnya</a></p>
        </div>
        <div class="flex items-center space-x-4 mt-4">
            <div id="carousel" class="flex overflow-x-auto space-x-4 scrollbar-hide">
                <div class="relative flex-shrink-0 w-52"><a href="video.php">
                    <img src="{{asset ('img/artikel (2).png') }}" alt="" class="w-full h-32 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-sm font-reguler">Meningkatkan Rasa Percaya Diri: Langkah-langkah Praktis</h3>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-52"><a href="#">
                    <img src="{{asset ('img/artikel (3).png') }}" alt="" class="w-full h-32 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-sm font-reguler">Meningkatkan Rasa Percaya Diri: Langkah-langkah Praktis</h3>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-52"><a href="#">
                    <img src="{{asset ('img/artikel (4).png') }}" alt="" class="w-full h-32 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-sm font-reguler">Meningkatkan Rasa Percaya Diri: Langkah-langkah Praktis</h3>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-52"><a href="#">
                    <img src="{{asset ('img/artikel (2).png') }}" alt="" class="w-full h-32 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-sm font-reguler">Meningkatkan Rasa Percaya Diri: Langkah-langkah Praktis</h3>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-52"><a href="#">
                    <img src="{{asset ('img/artikel (1).png') }}" alt="" class="w-full h-32 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-sm font-reguler">Meningkatkan Rasa Percaya Diri: Langkah-langkah Praktis</h3>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-52"><a href="#">
                    <img src="{{asset ('img/artikel (2).png') }}" alt="" class="w-full h-32 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-sm font-reguler">Meningkatkan Rasa Percaya Diri: Langkah-langkah Praktis</h3>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-52"><a href="#">
                    <img src="{{asset ('img/artikel (1).png') }}" alt="" class="w-full h-32 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-sm font-reguler">Meningkatkan Rasa Percaya Diri: Langkah-langkah Praktis</h3>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div id="podcast" class="mt-28 mx-10 mb-20">
        <div class="flex items-center justify-between">
            <h4 class="text-lg font-bold text-[#1A74A0]">Podcast</h4>
            <p class="text-right text-[#339af0]"><a href="{{ route('user.podcast') }}">Selanjutnya</a></p>
        </div>
        <div class="flex items-center space-x-4 mt-4">
            <div id="carousel" class="flex overflow-x-auto space-x-4 scrollbar-hide">
                <div class="relative flex-shrink-0 w-36"><a href="podcast.php">
                    <img src="{{asset ('img/podcast (5).png') }}" alt="" class="w-full h-36 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-xs font-semibold">Meningkatkan Rasa Percaya Diri: Langkah-langkah Praktis</h3>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-36"><a href="#">
                    <img src="{{asset ('img/podcast (3).png') }}" alt="" class="w-full h-36 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-xs font-semibold">Meningkatkan Rasa Percaya Diri: Langkah-langkah Praktis</h3>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-36"><a href="#">
                    <img src="{{asset ('img/podcast (2).png') }}" alt="" class="w-full h-36 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-xs font-semibold">Meningkatkan Rasa Percaya Diri: Langkah-langkah Praktis</h3>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-36"><a href="#">
                    <img src="{{asset ('img/podcast (3).png') }}" alt="" class="w-full h-36 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-xs font-semibold">Meningkatkan Rasa Percaya Diri: Langkah-langkah Praktis</h3>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-36"><a href="#">
                    <img src="{{asset ('img/podcast (2).png') }}" alt="" class="w-full h-36 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-xs font-semibold">Meningkatkan Rasa Percaya Diri: Langkah-langkah Praktis</h3>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-36"><a href="#">
                    <img src="{{asset ('img/podcast (1).png') }}" alt="" class="w-full h-36 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-xs font-semibold">Meningkatkan Rasa Percaya Diri: Langkah-langkah Praktis</h3>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-36"><a href="#">
                    <img src="{{asset ('img/podcast (4).png') }}" alt="" class="w-full h-36 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-xs font-semibold">Meningkatkan Rasa Percaya Diri: Langkah-langkah Praktis</h3>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-36"><a href="#">
                    <img src="{{asset ('img/podcast (5).png') }}" alt="" class="w-full h-36 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-xs font-semibold">Meningkatkan Rasa Percaya Diri: Langkah-langkah Praktis</h3>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-36"><a href="#">
                    <img src="{{asset ('img/podcast (3).png') }}" alt="" class="w-full h-36 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-xs font-semibold">Meningkatkan Rasa Percaya Diri: Langkah-langkah Praktis</h3>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-36"><a href="#">
                    <img src="{{asset ('img/podcast (2).png') }}" alt="" class="w-full h-36 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-xs font-semibold">Meningkatkan Rasa Percaya Diri: Langkah-langkah Praktis</h3>
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    @include('user.partials.footer')
</body>
<script>
    const iframe = document.querySelector('iframe');
    iframe.onload = function() {
      iframe.style.height = iframe.contentWindow.document.body.scrollHeight + 'px';
    };
</script>
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