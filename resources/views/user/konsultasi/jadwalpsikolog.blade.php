@extends('user.layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jadwal Konsultasi</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/flowbite-datepicker/dist/js/datepicker.min.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="styles.css">
  <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  @include('user.partials.header')
</head>


<body >
  <header id="header-placeholder" class=" bg-white mt-0 shadow z-50">
        <script src="header.js"></script>
  </header>
  <div class="flex justify-between mt-20 ml-5">
      <!-- Header -->
    <div class="flex items-center">
        <div class=" h-10 w-10 border-2 rounded-md shadow-sm">
          <button class="back-button text-xl ml-2 mt-1 hover:text-gray-300" onclick="history.back()">
            <i class="fa-solid fa-arrow-left"></i>
          </button>
        </div>
        <nav class="text-gray-600 text-sm ml-5">
        <a href="{{ route('user.dashboard') }}" class="hover:underline">Home</a>
        <span class="mx-2">›</span>
        <a href="{{ route('psikolog.daftar') }}" class="font-medium text-sm text-gray-600 hover:underline">Psikolog</a>
        <span class="mx-2">›</span>
        <span class="font-medium text-sm text-gray-900 hover:underline">Jadwal Konsultasi</span>
        </nav>
    </div>
  </div>

  <div class="max-w-8xl mx-auto bg-white shadow-lg rounded-lg p-6">
    <div class="grid grid-cols-3 gap-4">
      <!-- Bagian kiri -->
      <div class="col-span-1 border-r pr-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Jadwal Konsultasi</h2>
        <div class="flex">
              <img src="{{ asset('img/foto_psikolog/'.$psikolog->foto) }}" alt="Foto Psikolog" class="w-16 h-16 rounded-full mb-4">
          <div class="ml-3">
            <h1 class="text-base font-medium text-sky-700 justify-center">{{ $psikolog->nama_lengkap }}</h1>
            <div class="flex justify-center text-center">
                  <i class="fa fa-star text-yellow-400 mt-1 mr-1"></i>
                  <p class="text-green-950 text-base font-medium mr-2">{{ $psikolog->penilaian }}</p>
                  <p class="text-base font-medium mx-2">|</p>
                  <i class="fa fa-briefcase text-gray-800 mt-1 mr-1"></i>
                  <p class="text-gray-800 font-light">{{ $psikolog->pengalaman_tahun }} tahun</p>
            </div>
          </div>
        </div>
        <div class="mt-6">
          <h3 class="text-sm font-medium text-gray-700 mb-2">Tanggal</h3>
          <p id="display-date" class="text-lg font-semibold text-gray-800">Silahkan pilih</p>
        </div>
        <div class="mt-6">
          <h3 class="text-sm font-medium text-gray-700 mb-2">Waktu</h3>
          <p id="display-time" class="text-lg font-semibold text-gray-800">Silahkan pilih</p>
        </div>
        <div class="mt-6">
          <h3 class="text-sm font-medium text-gray-700 mb-2">Sesi</h3>
          <p id="display-sesi" class="text-lg font-semibold text-gray-800">Silahkan pilih</p>
          <p class="font-extralight text-xs">*1 sesi = 45 menit</p>
        </div>
      </div>

      <!-- Bagian tengah -->
      <div class="max-w-5xl bg-white px-5 ">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Jadwal Konsultasi</h2>

        <form action="{{ route('booking.store', ['id' => $psikolog->id]) }}" class="flex" method="POST">
          @csrf
          <!-- Pemilihan Tanggal -->
          <div class="mb-6">
            <label for="datepicker" class="block text-sm font-medium text-gray-700 mb-2">Pilih Tanggal</label>
            <div id="datepicker" class="border rounded-lg shadow-sm"></div>
            <input type="hidden" id="selected-date" name="tanggal" value="">
          </div>

          <!-- Pemilihan Waktu -->
          <div class="mx-6">
            <label for="selected-time" class="block text-sm font-medium text-gray-700 mb-2">Pilih Waktu</label>
            <input type="time" id="selected-time" name="waktu" class="block w-full border rounded-lg py-2 px-3 text-gray-700 shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            <div class="mt-4">
                <label for="selected-session" class="block text-sm font-medium text-gray-700 mb-2">Pilih Sesi</label>
                <select id="selected-session" name="sesi" 
                    class="block w-full border rounded-lg py-2 px-3 text-gray-700 shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    <option value="0"> Sesi</option>
                    <option value="1">1 Sesi</option>
                    <option value="2">2 Sesi</option>
                    <option value="3">3 Sesi</option>
                </select>
            </div>
          </div>


          <!-- Konfirmasi -->
          <div class="mt-6 text-right">
            <button type="submit" class="bg-blue-600 text-white font-medium py-2 px-6 rounded-lg hover:bg-blue-700">Next Step</button>
            </div>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/flowbite-datepicker/dist/js/datepicker.min.js"></script>
  <script>
    // Konfigurasi kalender
    const today = new Date(); // Tanggal hari ini

    const inlineDatepicker = new Datepicker(document.querySelector('#datepicker'), {
        todayHighlight: true,
        format: 'yyyy/mm/dd',
        startDate: today, // Mulai dari hari ini
        autohide: true // Sembunyikan otomatis setelah memilih tanggal
    });

    // Fungsi untuk menangkap tanggal yang dipilih
    document.querySelector('#datepicker').addEventListener('changeDate', (e) => {
        const date = e.detail.date;

        // Format tanggal menjadi yyyy/mm/dd
        const year = date.getFullYear();
        const month = String(date.getMonth() + 1).padStart(2, '0'); // Bulan dimulai dari 0
        const day = String(date.getDate()).padStart(2, '0'); // Hari selalu dua digit

        const formattedDate = `${year}/${month}/${day}`;

        // Tampilkan tanggal yang diformat
        document.getElementById('display-date').textContent = formattedDate;

        // Simpan tanggal yang diformat ke input hidden
        document.getElementById('selected-date').value = formattedDate;
    });

    // Fungsi untuk menangkap waktu yang dipilih
    document.getElementById('selected-time').addEventListener('input', (e) => {
        const time = e.target.value;

        // Format waktu untuk tampilan
        const formattedTime = time ? time : "Silahkan pilih";
        document.getElementById('display-time').textContent = formattedTime;
    });

    // Fungsi untuk menangkap sesi yang dipilih
    document.getElementById('selected-session').addEventListener('change', (e) => {
        const sesi = e.target.value;

        // Format sesi untuk tampilan
        const displaySesi = sesi > 0 ? `${sesi} Sesi` : "Silahkan pilih";
        document.getElementById('display-sesi').textContent = displaySesi;
    });
  </script>
</body>
</html>
