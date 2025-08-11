{{-- filepath: resources/views/user/konsultasi/deskripsipsikolog.blade.php --}}
@extends('user.layouts.app')


<header id="header-placeholder" class="bg-white mt-0 shadow z-50">
    @include('user.partials.header')
</header>
@section('content')
<div class="flex justify-between mt-20 ml-5">
    <div class="flex items-center">
      <div class=" h-10 w-10 border-2 rounded-md shadow-sm">
        <button class="back-button text-xl ml-2 mt-1 hover:text-gray-300" onclick="history.back()">
          <i class="fa-solid fa-arrow-left"></i>
        </button>
      </div>
      <nav class="text-gray-600 text-sm ml-5">
        <a href="{{ route('user.dashboard') }}" class="hover:underline">Home</a>
        <span class="mx-2">›</span>
        <a href="{{ route('psikolog.daftar') }}" class="font-medium text-sm text-gray-900 hover:underline">Psikolog</a>
      </nav>
    </div>
</div>

<main class="p-6 max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-6">
    <!-- Sidebar Profile Card -->
    <aside class="border rounded-lg  p-6 h-fit bg-sky-300/10 shadow-lg flex flex-col items-center">
            <img src="{{ asset('img/foto_psikolog/'.$psikolog->foto) }}" alt="Foto Psikolog" class="w-44 h-44 rounded-full mb-4">
        <div class="text-center">
            <div class="flex justify-center">
                <i class="fa fa-star text-yellow-400 mt-0.5"></i>
                <p class="text-green-950 text-base font-medium">{{ $psikolog->penilaian }}</p>
            </div>
            <p class="text-gray-500">Rp {{ number_format($psikolog->biaya_konsultasi, 0, ',', '.') }}</p>
            <p class="text-sm text-blue-500 mb-4">Online</p>
        </div>
        <div class="flex space-x-4 mt-4">
            <button id="phone-button" class="bg-blue-400 text-white p-2 px-3 rounded-md hover:bg-blue-600"><i class="fas fa-phone text-xl hover:text-blue-950"></i></button>
            <button id="message-button" class="bg-blue-400 text-white p-2 px-3 rounded-md hover:bg-blue-600"><i class="fas fa-comment text-xl hover:text-blue-950"></i></button>
            <button id="video-call-button" class="bg-blue-400 text-white p-2 px-3 rounded-md hover:bg-blue-600"><i class="fa-solid fa-video text-xl hover:text-blue-950"></i></button>
        </div>
        <a href="{{ route('psikolog.jadwal', ['id' => $psikolog->id]) }}" class="w-full">
            <button class="bg-blue-600 text-white w-full py-2 rounded-md mt-4 hover:bg-blue-700">Book</button>
        </a>
    </aside>

    <!-- Profile Detail -->
    <section class="bg-white p-6 md:col-span-2">
      <h1 class="text-4xl font-bold text-sky-700 mb-4">{{ $psikolog->nama_lengkap }}</h1>
      <p class="text-gray-500 text-sm mb-2">Nomor Izin Praktik: <span class="font-semibold text-gray-800">{{ $psikolog->nomor_lisensi }}</span></p>
      <div class="mt-4">
        <h3 class="font-bold text-sky-700">Spesialis</h3>
        <div class="flex space-x-2 mt-2">
          @foreach (explode(',', $psikolog->spesialis) as $sp)
            <span class='border-blue-500 border text-gray-800 px-2 py-1 rounded-2xl font-light'>psikolog {{ $sp }}</span>
          @endforeach
        </div>
      </div>
      <div class="mt-4">
        <h3 class="font-bold text-sky-700">Issues</h3>
        <div class="flex flex-wrap gap-2 mt-2">
          @foreach (explode(',', $psikolog->issues ?? '') as $issue)
            <span class='border-blue-500 border text-gray-800 px-2 py-1 rounded-2xl font-light'>{{ $issue }}</span>
          @endforeach
        </div>
      </div>
      <div class="mt-4">
        <h3 class="font-bold text-sky-700">Qualifications</h3>
        <p class="text-gray-500 font-light">{{ $psikolog->kualifikasi }}</p>
      </div>
      <div class="mt-4">
        <h3 class="font-bold text-sky-700">Experience</h3>
        <p class="text-gray-500 font-light">Pengalaman: {{ $psikolog->pengalaman_tahun }} tahun</p>
        <p class="text-gray-500 font-light">Jumlah Konsultasi: {{ $psikolog->jumlah_konsultasi }} Konsultasi</p>
      </div>
      <div class="mt-4">
        <h3 class="font-bold text-sky-700">About</h3>
        <p class="text-gray-500 font-light">{{ $psikolog->deskripsi }}</p>
      </div>
    </section>
</main>
@endsection
