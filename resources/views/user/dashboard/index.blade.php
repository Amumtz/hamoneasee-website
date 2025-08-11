@extends('user.layouts.app')


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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>HarmonEase</title>
    @include('user.partials.header')
</head>
@section('content')
<body class="max-width-full">  
   <header id="header-placeholder" class="bg-white mt-0 shadow z-50"></header>
    
    <main class="width: 100%; padding: 0;">
        <!-- Bagian Intro -->
        <section class="intro py-5 bg-white">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <!-- Teks di kiri -->
                    <div class="col-md-6">
                        <h1 class="fw-bold text-primary text-2xl">Seputar Kesehatan Mental</h1>
                        <p class="lead text-muted">Temukan artikel, tips, dan informasi terbaru tentang kesehatan mental.</p>
                        <button class="btn btn-primary mt-3 mb-3">KUNJUNGI</button>
                        <div class="features d-flex justify-content-between mt-4">
                            <div class="text-center">
                                <i class="fas fa-check-circle text-success fa-2x"></i>
                                <h3 class="text-primary">Mudah</h3>
                                <p class="text-muted">Hanya dengan beberapa klik</p>
                            </div>
                            <div class="text-center">
                                <i class="fas fa-clock text-dark fa-2x"></i>
                                <h3 class="text-primary">Efisien</h3>
                                <p class="text-muted">Website yang terpercaya</p>
                            </div>
                            <div class="text-center">
                                <i class="fas fa-shield-alt text-primary fa-2x"></i>
                                <h3 class="text-primary">Terpercaya</h3>
                                <p class="text-muted">Semua psikolog bersertifikat</p>
                            </div>
                        </div>
                    </div>
                    <!-- Gambar di kanan -->
                    <div class="col-md-6 text-center">
                        <img src="{{ asset('img/Banner1.png') }}" alt="Mental Health Banner" class="gambarawal">
                    </div>
                </div>
            </div>
        </section>
        

        <!-- Bagian Stats -->
        <section class="stats d-flex justify-content-around py-4 bg-white">
            
            <div class="d-flex align-items-center text-center">
                <i class="fas fa-user-md fa-3x me-3"></i> <!-- Ikon dengan margin kanan -->
                <div>
                    <span class="d-block display-4 fw-bold">{{ $countPsikolog }}</span>
                    <p class="mb-0">Psikolog</p>
                </div>
            </div>
            <div class="d-flex align-items-center text-center">
                <i class="fas fa-users fa-3x me-3"></i> <!-- Ikon dengan margin kanan -->
                <div>
                    <span class="d-block display-4 fw-bold">{{ $totalUsers }}</span>
                    <p class="mb-0">Pengguna</p>
                </div>
            </div>
        </section>

        <!-- Tes Kesehatan Mental -->
        <section class="py-5 bg-white">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <h2 class="fw-bold text-primary text-2xl">Tes Kesehatan Mental</h2>
                        <p class="text-muted">
                            Ikuti tes kesehatan mental kami untuk mendapatkan wawasan tentang kondisi Anda. Tes ini mencakup berbagai aspek seperti depresi, kecemasan, dan stres, memberikan gambaran awal untuk langkah selanjutnya dalam merawat kesejahteraan Anda.
                        </p>
                    </div>
                </div>
                <div class="row align-items-center mt-4">
                    <div class="col-md-4 text-center">
                        <img src="{{ asset('img/Group 961.png') }}" alt="Mental Health" class="img-fluid rounded">
                    </div>
                    <div class="col-md-8">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <div class="card text-center shadow-sm border-3 h-100">
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title fw-bold mb-3 text-primary ">Tes Kecemasan</h5>
                                        <p class="card-text text-muted">Tes ini menilai tingkat kecemasan dan gejala yang terkait, seperti rasa khawatir berlebihan, ketegangan otot, dan kesulitan berkonsentrasi</p>
                                        <button class="btn btn-primary btn-sm mt-auto">Selengkapnya</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card text-center shadow-sm border-3 h-100">
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title fw-bold mb-3 text-primary">Tes Depresi</h5>
                                        <p class="card-text text-muted line-clamp-5">Tes ini mengukur tingkat gejala depresi, seperti perasaan sedih yang mendalam, kehilangan minat dalam aktivitas, perubahan pola tidur, dan nafsu makan </p>
                                        <button class="btn btn-primary btn-sm mt-auto">Selengkapnya</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card text-center shadow-sm border-3 h-100">
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title fw-bold mb-3 text-primary">Tes Stres</h5>
                                        <p class="card-text text-muted">Tes ini mengevaluasi tingkat stres Anda dan dampaknya terhadap kesejahteraan fisik dan mental Anda. Dengan mengetahui tingkat stres</p>
                                        <button class="btn btn-primary btn-sm mt-auto">Selengkapnya</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>

        <!-- Konsultasi -->
        <section class="py-5 bg-white mb-5 mt-5 ml-5">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h2 class="fw-bold text-primary text-2xl">Konsultasi</h2>
                        <p class="text-muted mb-5">Dapatkan dukungan dari ahli kesehatan mental melalui sesi konsultasi pribadi. Temukan panduan profesional untuk mengatasi masalah kecemasan, depresi, dan tantangan lainnya yang Anda hadapi.</p>
                        <button class="btn btn-primary">Kunjungi</button>
                    </div>
                    <div class="col-md-6 text-center">
                        <img src="{{ asset('img/konsul.png') }}" alt="Consultation" class="gambarkonsultasi">
                    </div>
                </div>
            </div>
        </section>

        <!-- meditasi  -->
        <section class="py-5 bg-white mt-5 mb-5">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-6 text-center">
                        <img src="{{ asset('img/meditasi2.png') }}" alt="Consultation" class="gambarmeditasi">
                    </div>
                    <div class="col-md-6">
                        <h2 class="fw-bold text-primary text-2xl">Meditasi</h2>
                        <p class="text-muted mb-5 mr-2">Temukan ketenangan dan keseimbangan dengan sesi meditasi kami yang dirancang khusus untuk Gen Z. Jelajahi panduan meditasi, musik relaksasi, dan tips praktis untuk membantu meredakan stres dan meningkatkan fokus.</p>
                        <button class="btn btn-primary">Kunjungi</button>
                    </div>
                </div>
            </div>
        </section>

        <br>
        <br>
        <br>
        <br>
        <div class="container-fluid mb-5">
            {{-- <a href="{{ route('wisata.index') }}"><h2 class="fw-bold text-primary mb-2 text-2xl">Rekomendasi Wisata</h2></a> --}}
            <div class="row">
                <div class="col d-flex "> 
    
                    <img src="{{ asset('img/karjaw.png') }}" class="gambarwisata" alt="Karimunjawa">
                    <div class="text ms-4">  <h1 class="fw-bold text-primary">Karimun jawa</h1>
                        <p>Karimunjawa terkenal dengan keindahan alam bawah lautnya, pantai pasir putih, dan perairan yang jernih. Kepulauan ini terdiri dari 27 pulau...</p></div>
                  
                    {{-- <a href="{{ route('wisata.wisata1')}}" class="">Lihat semua</a> --}}
                </div>
              
            <div class="row mt-5">
                <div class="col d-flex">   
    
                    <img src="{{ asset('img/labajo.png') }}" class="gambarwisata" alt="Karimunjawa">
                   <div class="text ms-4">
                    <h1 class="fw-bold text-primary">Labuan bajo</h1>
                    <p>Labuan Bajo merupakan pintu gerbang ke Taman Nasional Komodo, rumah bagi komodo, spesies kadal terbesar di dunia...</p>
                   </div>
                    {{-- <a href="{{ route('wisata.wisata2')}}" class="">Lihat semua</a> --}}
                </div>
            </div>
        </div>

        <br>
        <br>
        <br>
        <br>
        <br>

        <h1 class="fw-bold text-primary mt-5 text-2xl">Baca Artikel Seputar Kesehatan Mental</h1>
        
        <div class="d-flex">
        <button type="button" class="btn btn-outline-primary me-3" id="buttona">Terbaru</button>
        <button type="button" class="btn btn-outline-primary me-3" id="buttona">Hubungan</button>
        <button type="button" class="btn btn-outline-primary me-3" id="buttona">Overthinking</button>
        <button type="button" class="btn btn-outline-primary me-3" id="buttona">Self-help</button>
        <button type="button" class="btn btn-outline-primary me-4" id="buttona">Kecemasan</button>
        {{-- <button type="button" class="me-1"><a href="{{ route('ruangEdukasi.artikel.index') }}" class="text-secondary ">Lihat semua</a></button> --}}
        </div>
       

        <section class="artikel-kesehatan">
            
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ asset('img/artikel1.png') }}" alt="Kesehatan Mental" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Kesehatan Mental</h5>
                            <p class="card-text">Kesehatan mental adalah aspek vital dalam kehidupan yang sering kali diabaikan. Seiring dengan meningkatnya tekanan hidup dan tuntutan sosial...</p>
                            <a href="#" class="btn btn-primary">Baca Selengkapnya</a>
                            <p class="card-text"><small class="text-muted">Sumber: Superideal.id</small></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ asset('img/artikel2.png') }}" alt="Kesehatan Mental" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Kesehatan Mental</h5>
                            <p class="card-text">Kesehatan mental adalah aspek vital dalam kehidupan yang sering kali diabaikan. Seiring dengan meningkatnya tekanan hidup dan tuntutan sosial...</p>
                            <a href="#" class="btn btn-primary">Baca Selengkapnya</a>
                            <p class="card-text"><small class="text-muted">Sumber: Superideal.id</small></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ asset('img/artikel3.png') }}" alt="Kesehatan Mental" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Kesehatan Mental</h5>
                            <p class="card-text">Kesehatan mental adalah aspek vital dalam kehidupan yang sering kali diabaikan. Seiring dengan meningkatnya tekanan hidup dan tuntutan sosial...</p>
                            <a href="#" class="btn btn-primary">Baca Selengkapnya</a>
                            <p class="card-text"><small class="text-muted">Sumber: Superideal.id</small></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    </div>
                <div class="col-md-4">
                    </div>
            </div>
        </section>
    

    </main>

    @include('user.partials.footer')
    
    <!-- Link ke Font Awesome untuk ikon media sosial -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection