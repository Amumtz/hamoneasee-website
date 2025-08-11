{{-- @extends('layouts.app') <!-- ganti jika layout kamu berbeda --> --}}

@section('content')
<div class="w-full min-h-screen bg-white flex flex-col items-center justify-center">

    <!-- Langkah Tes -->
    <div class="flex items-center space-x-2 mb-6">
        <div class="flex items-center space-x-2 text-blue-600">
            <div class="w-4 h-4 rounded-full bg-blue-600"></div>
            <span class="font-medium">Test Questions</span>
        </div>
        <div class="w-10 h-0.5 bg-blue-600"></div>
        <div class="flex items-center space-x-2 text-blue-600">
            <div class="w-4 h-4 rounded-full bg-blue-600"></div>
            <span class="font-medium">Result</span>
        </div>
    </div>

    <!-- Hasil Tes -->
    <div class="bg-blue-700 text-white w-full max-w-3xl text-center p-6 rounded-t-lg">
        <h2 class="text-2xl font-bold mb-2">Hasil Tes Kesehatan</h2>
        <p class="text-sm">
            Pertanyaan-pertanyaan ini didasarkan pada alat skrining berbasis bukti tetapi hanya bersifat indikatif dan tidak merupakan diagnosis formal.
        </p>
    </div>

    <!-- Skor & Deskripsi -->
    <div class="w-full max-w-3xl bg-white shadow-lg p-6 border border-t-0 border-gray-200 rounded-b-lg text-center">
        <p class="mb-2 text-gray-700">Respon anda menunjukan bahwa</p>
        <h3 class="text-lg font-semibold mb-4">
            Anda mengalami banyak gejala gangguan kecemasan.
        </h3>

        <!-- Progress Bar -->
        @php
            $skor = 18; // ini bisa diganti dengan variabel dari controller
            $persentase = ($skor / 40) * 100;
        @endphp

        <div class="relative w-full h-6 bg-gray-200 rounded-full overflow-hidden mb-4">
            <div class="absolute left-0 top-0 h-full bg-blue-600" style="width: {{ $persentase }}%;"></div>
            <div class="absolute top-0 left-1/2 transform -translate-x-1/2 h-full flex items-center justify-center">
                <span class="text-xs font-semibold text-white">{{ $skor }}</span>
            </div>
        </div>

        <!-- Kategori -->
        <div class="flex justify-between text-sm text-gray-700 font-medium">
            <span>tidak terlalu (1–10)</span>
            <span>kemungkinan (11–26)</span>
            <span>sudah pasti (27–40)</span>
        </div>
    </div>

    <!-- Tombol Next -->
    <a href="#" class="mt-6 bg-blue-500 hover:bg-blue-600 text-white rounded-full p-4 inline-flex items-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
        </svg>
    </a>
</div>
@endsection
