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
    <title>Document</title>
    @include('user.partials.header')
</head>
<body>
    <header id="header-placeholder" class=" bg-white mt-0 shadow z-50">
        <script src="header.js"></script>
    </header>
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
        <h2 class="text-xl font-bold mb-4">Podcast Strategi Self-Help dan Peningkatan Diri</h2>
        <div class="flex items-center space-x-4 mt-4">
            <div id="carousel" class="flex overflow-x-auto space-x-4 scrollbar-hide">
                <div class="relative flex-shrink-0 w-44"><a href="{{route ('user.podcast.detail') }}">
                    <img src="{{asset ('img/podcast (1).png') }}" alt="" class="w-full h-40 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-md mt-3 font-semibold">Playlist 1</h3>
                    <p class="text-gray-500 text-xs font-extralight ">description</p>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-44"><a href="{{ route ('user.podcast.detail') }}">
                    <img src="{{asset ('img/podcast (1).png') }}" alt="" class="w-full h-40 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-md mt-3 font-semibold">Playlist 2</h3>
                    <p class="text-gray-500 text-xs font-extralight ">description</p>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-44"><a href="{{ route ('user.podcast.detail') }}">
                    <img src="{{asset ('img/podcast (1).png') }}" alt="" class="w-full h-40 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-md mt-3 font-semibold">Playlist 3</h3>
                    <p class="text-gray-500 text-xs font-extralight ">description</p>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-44"><a href="{{ route ('user.podcast.detail') }}">
                    <img src="{{asset ('img/podcast (1).png') }}" alt="" class="w-full h-40 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-md mt-3 font-semibold">Playlist 4</h3>
                    <p class="text-gray-500 text-xs font-extralight ">description</p>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-44"><a href="{{ route ('user.podcast.detail') }}">
                    <img src="{{asset ('img/podcast (1).png') }}" alt="" class="w-full h-40 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-md mt-3 font-semibold">Playlist 5</h3>
                    <p class="text-gray-500 text-xs font-extralight ">description</p>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-44"><a href="{{ route ('user.podcast.detail') }}">
                    <img src="{{asset ('external/thumbnailpodcast (1).jpg') }}" alt="" class="w-full h-40 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-md mt-3 font-semibold">Playlist 6</h3>
                    <p class="text-gray-500 text-xs font-extralight ">description</p>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-44"><a href="{{ route ('user.podcast.detail') }}">
                    <img src="{{asset ('external/thumbnailpodcast (1).jpg') }}" alt="" class="w-full h-40 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-md mt-3 font-semibold">Playlist 7</h3>
                    <p class="text-gray-500 text-xs font-extralight ">description</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="my-16 mx-20">
        <h2 class="text-xl font-bold mb-4">Podcast Strategi Self-Help dan Peningkatan Diri</h2>
        <div class="flex items-center space-x-4 mt-4">
            <div id="carousel" class="flex overflow-x-auto space-x-4 scrollbar-hide">
                <div class="relative flex-shrink-0 w-44"><a href="artikel1.html">
                    <img src="{{asset ('external/thumbnailpodcast (1).jpg') }}" alt="" class="w-full h-40 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-md mt-3 font-semibold">Playlist 1</h3>
                    <p class="text-gray-500 text-xs font-extralight ">description</p>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-44"><a href="{{ route ('user.podcast.detail') }}">
                    <img src="{{asset ('external/thumbnailpodcast (1).jpg') }}" alt="" class="w-full h-40 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-md mt-3 font-semibold">Playlist 1</h3>
                    <p class="text-gray-500 text-xs font-extralight ">description</p>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-44"><a href="{{ route ('user.podcast.detail') }}">
                    <img src="{{asset ('external/thumbnailpodcast (1).jpg') }}" alt="" class="w-full h-40 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-md mt-3 font-semibold">Playlist 1</h3>
                    <p class="text-gray-500 text-xs font-extralight ">description</p>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-44"><a href="{{ route ('user.podcast.detail') }}">
                    <img src="{{asset ('external/thumbnailpodcast (1).jpg') }}" alt="" class="w-full h-40 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-md mt-3 font-semibold">Playlist 1</h3>
                    <p class="text-gray-500 text-xs font-extralight ">description</p>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-44"><a href="{{ route ('user.podcast.detail') }}">
                    <img src="{{asset ('external/thumbnailpodcast (1).jpg') }}" alt="" class="w-full h-40 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-md mt-3 font-semibold">Playlist 1</h3>
                    <p class="text-gray-500 text-xs font-extralight ">description</p>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-44"><a href="{{ route ('user.podcast.detail') }}">
                    <img src="{{asset ('external/thumbnailpodcast (1).jpg') }}" alt="" class="w-full h-40 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-md mt-3 font-semibold">Playlist 1</h3>
                    <p class="text-gray-500 text-xs font-extralight ">description</p>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-44"><a href="{{ route ('user.podcast.detail') }}">
                    <img src="{{asset ('external/thumbnailpodcast (1).jpg') }}" alt="" class="w-full h-40 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-md mt-3 font-semibold">Playlist 1</h3>
                    <p class="text-gray-500 text-xs font-extralight ">description</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="my-16 mx-20">
        <h2 class="text-xl font-bold mb-4">Podcast Strategi Self-Help dan Peningkatan Diri</h2>
        <div class="flex items-center space-x-4 mt-4">
            <div id="carousel" class="flex overflow-x-auto space-x-4 scrollbar-hide">
                <div class="relative flex-shrink-0 w-44"><a href="artikel1.html">
                    <img src="{{asset ('external/thumbnailpodcast (1).jpg') }}" alt="" class="w-full h-40 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-md mt-3 font-semibold">Playlist 1</h3>
                    <p class="text-gray-500 text-xs font-extralight ">description</p>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-44"><a href="{{ route ('user.podcast.detail') }}">
                    <img src="{{asset ('external/thumbnailpodcast (1).jpg') }}" alt="" class="w-full h-40 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-md mt-3 font-semibold">Playlist 1</h3>
                    <p class="text-gray-500 text-xs font-extralight ">description</p>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-44"><a href="{{ route ('user.podcast.detail') }}">
                    <img src="{{asset ('external/thumbnailpodcast (1).jpg') }}" alt="" class="w-full h-40 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-md mt-3 font-semibold">Playlist 1</h3>
                    <p class="text-gray-500 text-xs font-extralight ">description</p>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-44"><a href="{{ route ('user.podcast.detail') }}">
                    <img src="{{asset ('external/thumbnailpodcast (1).jpg') }}" alt="" class="w-full h-40 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-md mt-3 font-semibold">Playlist 1</h3>
                    <p class="text-gray-500 text-xs font-extralight ">description</p>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-44"><a href="{{ route ('user.podcast.detail') }}">
                    <img src="{{asset ('external/thumbnailpodcast (1).jpg') }}" alt="" class="w-full h-40 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-md mt-3 font-semibold">Playlist 1</h3>
                    <p class="text-gray-500 text-xs font-extralight ">description</p>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-44"><a href="{{ route ('user.podcast.detail') }}">
                    <img src="{{asset ('external/thumbnailpodcast (1).jpg') }}" alt="" class="w-full h-40 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-md mt-3 font-semibold">Playlist 1</h3>
                    <p class="text-gray-500 text-xs font-extralight ">description</p>
                    </a>
                </div>
                <div class="relative flex-shrink-0 w-44"><a href="{{ route ('user.podcast.detail') }}">
                    <img src="{{asset ('external/thumbnailpodcast (1).jpg') }}" alt="" class="w-full h-40 object-cover rounded-lg">
                    <h3 class="text-gray-950 text-md mt-3 font-semibold">Playlist 1</h3>
                    <p class="text-gray-500 text-xs font-extralight ">description</p>
                    </a>
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
                    <img src="{{asset ('img/logo.png') }}" alt="Logo Perusahaan" class="w-16 h-16">
                    <h1 class="text-2xl ml-2 text-gray-900 font-medium text-center">HarmonEasee</h1>
                </div>
    
                <!-- Menu COMPANY -->
                <div class="col-span-1 ml-10 mb-6">
                    <h3 class="text-xl font-semibold mb-4">Company</h3>
                    <ul class="space-y-2">
                        <li><a href="aboutus.php" class="text-gray-400 hover:text-gray-700">About Us</a></li>
                        <li><a href="{{ route ('user.podcast.detail') }}"> class="text-gray-400 hover:text-gray-700">Careers</a></li>
                        <li><a href="{{ route ('user.podcast.detail') }}"> class="text-gray-400 hover:text-gray-700">Our Story</a></li>
                    </ul>
                </div>
    
                <!-- Menu Service -->
                <div class="col-span-1 mb-6">
                    <h3 class="text-xl font-semibold mb-4">Services</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route ('user.podcast.detail') }}"> class="text-gray-400 hover:text-gray-700">Consulting</a></li>
                        <li><a href="{{ route ('user.podcast.detail') }}"> class="text-gray-400 hover:text-gray-700">Support</a></li>
                        <li><a href="{{ route ('user.podcast.detail') }}"> class="text-gray-400 hover:text-gray-700">Custom Solutions</a></li>
                    </ul>
                </div>
    
                <!-- Menu Resources -->
                <div class="col-span-1 mb-6">
                    <h3 class="text-xl font-semibold mb-4">Resources</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route ('user.podcast.detail') }}"> class="text-gray-400 hover:text-gray-700">Blog</a></li>
                        <li><a href="{{ route ('user.podcast.detail') }}"> class="text-gray-400 hover:text-gray-700">Guides</a></li>
                        <li><a href="{{ route ('user.podcast.detail') }}"> class="text-gray-400 hover:text-gray-700">FAQs</a></li>
                    </ul>
                </div>
    
                <!-- Social Media Icons -->
                <div class="col-span-1 mb-6 flex flex-col items-start">
                    <h3 class="text-xl font-semibold mb-4">Follow Us</h3>
                    <div class="flex space-x-4">
                        <a href="{{ route ('user.podcast.detail') }}"> class="text-gray-400 hover:text-gray-900">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="{{ route ('user.podcast.detail') }}"> class="text-gray-400 hover:text-gray-900">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="{{ route ('user.podcast.detail') }}"> class="text-gray-400 hover:text-gray-900">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="{{ route ('user.podcast.detail') }}"> class="text-gray-400 hover:text-gray-900">
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