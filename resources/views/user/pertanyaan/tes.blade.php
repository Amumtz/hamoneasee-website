@extends('user.layouts.app') {{-- Pastikan kamu sudah punya layout ini --}}

@section('content')
<div class="container">
    <!-- Progress Steps -->
    <div class="flex justify-center items-center space-x-4 mb-6">
        <div class="flex items-center space-x-2">
            <div class="w-5 h-5 bg-blue-600 rounded-full"></div>
            <span class="text-sm font-medium">Test Questions</span>
        </div>
        <div class="w-10 h-1 bg-blue-400 rounded"></div>
        <div class="flex items-center space-x-2">
            <div class="w-5 h-5 border-2 border-blue-600 rounded-full"></div>
            <span class="text-sm font-medium text-blue-600">Result</span>
        </div>
    </div>

    <!-- Card -->
    <div class="bg-blue-100 p-6 rounded-lg border-2 border-blue-400 shadow-md text-center">
        <h2 class="text-xl font-bold text-blue-800 mb-4">Pertanyaan 10</h2>
        <p class="mb-6 text-lg font-semibold text-gray-800">Seberapa sering Anda merasa tertekan atau murung dalam dua minggu terakhir?</p>

        <!-- Pilihan Jawaban -->
        <form action="{{ route('pertanyaan.submit') }}" method="POST">
            @csrf
            <div class="flex flex-wrap justify-center gap-4">
                <button type="submit" name="jawaban" value="Never" class="bg-white text-blue-600 font-semibold py-2 px-6 rounded-full shadow hover:bg-blue-50">Never</button>
                <button type="submit" name="jawaban" value="Rarely" class="bg-white text-blue-600 font-semibold py-2 px-6 rounded-full shadow hover:bg-blue-50">Rarely</button>
                <button type="submit" name="jawaban" value="Sometimes" class="bg-white text-blue-600 font-semibold py-2 px-6 rounded-full shadow hover:bg-blue-50">Sometimes</button>
                <button type="submit" name="jawaban" value="Often" class="bg-white text-blue-600 font-semibold py-2 px-6 rounded-full shadow hover:bg-blue-50">Often</button>
                <button type="submit" name="jawaban" value="Very often" class="bg-white text-blue-600 font-semibold py-2 px-6 rounded-full shadow hover:bg-blue-50">Very often</button>
            </div>
        </form>
    </div>

    <!-- Progress Bar -->
    <div class="mt-6">
        <div class="w-full bg-gray-200 rounded-full h-3">
            <div class="bg-blue-600 h-3 rounded-full" style="width: 100%;"></div>
        </div>
        <div class="text-center mt-2 font-semibold">Pertanyaan 10 dari 10</div>
    </div>
</div>
@endsection
