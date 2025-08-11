@extends('user.layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HarmonEasee Konsultasi</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;700&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
       @include('user.partials.header')
</head>
<body>
    <header id="header-placeholder" class="bg-white mt-0 shadow z-50"></header>
    
    <!-- History Button Section -->
    <div class="px-6 mt-20">
        <a href="{{ route('booking.history') }}" class="inline-flex items-center bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            <i class="fas fa-history mr-2"></i>
            Riwayat Konsultasi
        </a>
    </div>

    <!-- Filter Section -->
    <form method="GET" action="{{ route('psikolog.daftar') }}" class="p-6 px-44 flex justify-between">
        <div class="flex-1">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-3 bg-gray-200/40 py-5 px-2 rounded-md w-full">
                <!-- Spesialis Dropdown -->
                <div>
                    <label class="block text-gray-700 font-medium">Spesialis</label>
                    <select name="spesialis" class="w-full p-2 mt-1 bg-gray-200/40">
                        <option value="all">Pilih spesialis</option>
                        <option value="klinis" {{ request('spesialis') == 'klinis' ? 'selected' : '' }}>Psikolog Klinis</option>
                        <option value="konseling" {{ request('spesialis') == 'konseling' ? 'selected' : '' }}>Psikolog Konseling</option>
                        <option value="anak-remaja" {{ request('spesialis') == 'anak-remaja' ? 'selected' : '' }}>Psikolog Anak dan Remaja</option>
                    </select>
                </div>
                <!-- Penilaian Dropdown -->
                <div>
                    <label class="block text-gray-700 font-medium">Penilaian</label>
                    <select name="penilaian" class="w-full p-2 mt-1 bg-gray-200/40">
                        <option value="all">Semua Penilaian</option>
                        <option value="4.5" {{ request('penilaian') == '4.5' ? 'selected' : '' }}>4.5 ke atas</option>
                        <option value="4.0" {{ request('penilaian') == '4.0' ? 'selected' : '' }}>4.0 ke atas</option>
                        <option value="3.5" {{ request('penilaian') == '3.5' ? 'selected' : '' }}>3.5 ke atas</option>
                    </select>
                </div>
                <!-- Biaya Konsultasi Dropdown -->
                <div>
                    <label class="block text-gray-700 font-medium">Biaya Konsultasi</label>
                    <select name="biaya_konsultasi" class="w-full p-2 mt-1 bg-gray-200/40">
                        <option value="all">Semua Biaya</option>
                        <option value="low" {{ request('biaya_konsultasi') == 'low' ? 'selected' : '' }}>Di bawah 50,000</option>
                        <option value="medium" {{ request('biaya_konsultasi') == 'medium' ? 'selected' : '' }}>50,000 - 100,000</option>
                        <option value="high" {{ request('biaya_konsultasi') == 'high' ? 'selected' : '' }}>Di atas 100,000</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="flex items-start space-x-3 ml-4">
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                <i class="fas fa-filter mr-2"></i>
                Filter
            </button>
        </div>
    </form>
    <h3 class="text-3xl font-bold my-7 ml-5 text-cyan-800">Psikolog yang cocok untuk anda</h3>
    <!-- Psikolog List -->
    <section class="p-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    @forelse ($psikologs as $psikolog)
        <div class="psikolog-card bg-[#F0F3FA] p-3 rounded-lg shadow-md flex flex-col justify-between">
            <!-- Header: Foto & Nama Psikolog -->
            <div class="flex items-center mb-2">
                <div class="w-16 h-16 bg-gray-300 rounded-full mr-4 overflow-hidden">
                    {{-- @if (!empty($psikolog->foto) && file_exists(public_path($psikolog->foto))) --}}
                        <img src="{{ asset('img/foto_psikolog/'.$psikolog->foto) }}" alt="Foto Psikolog" class="w-full h-full object-cover">
                    {{-- @else
                        <span class="text-gray-500">Foto tidak tersedia</span>
                    @endif --}}
                </div>
                <div>
                    <h3 class="text-lg font-medium">{{ $psikolog->nama_lengkap }}</h3>
                    <div class="text-sm flex text-gray-500 items-center">
                        <div class="flex items-center">
                            <p class="mr-1">{{ $psikolog->spesialis }}</p>
                            <span class="mx-1">|</span>
                            <p class="mr-2">{{ $psikolog->jumlah_konsultasi }}+ konsultasi</p>
                            <span class="mx-1">|</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fa fa-star text-yellow-300 mr-1"></i>
                            <p>{{ $psikolog->penilaian }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Issues -->
            <div class="issues-container mb-1 flex flex-wrap ">
                @foreach (explode(',', $psikolog->issues ?? '') as $specialty)
                    @if($specialty)
                        <span class="issue-item text-xs border border-blue-600 text-gray-800 px-2 py-1 rounded-md mr-0.5">{{ $specialty }}</span>
                    @endif
                @endforeach
            </div>
            <!-- Footer: Biaya & Tombol -->
            <div class="flex justify-between items-center">
                <div class="text-left">
                    <p class="font-medium text-lg">Rp. {{ number_format($psikolog->biaya_konsultasi, 0, ',', '.') }}<span class="text-xs font-normal">/ sesi</span></p>
                </div>
                <a href="{{ route('psikolog.deskripsi', ['id' => $psikolog->id]) }}">
                    <button class="bg-blue-600 text-white px-4 py-2 rounded-2xl hover:bg-blue-700">Book</button>
                </a>
            </div>
        </div>
    @empty
        <p class="col-span-3 text-center text-gray-500">Tidak ada psikolog ditemukan.</p>
    @endforelse
    </section>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
@endsection
