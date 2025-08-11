@extends('user.layouts.app')


@section('content')
<!DOCTYPE html>
<html lang="en">
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

<body>
   
    <header id="header-placeholder" class=" bg-white mt-0 shadow z-50">
        <script src="header.js"></script>
    </header>

    <div class="container mt-5 py-5">
        <h1 class="text-center text-primary text-3xl">Topik Meditasi Untukmu</h1>
        <div class="row mt-4">
            <h3 class="text-xl">Video</h3>
            <!-- Video Section -->
            <div class="col-md-4 my-2">
                <div class="card shadow-sm meditation-card">
                    <a href="video.html">
                    <img src="{{ asset('img/meditasi (1).png') }}" class="card-img-top" alt="Body Scan">
                    <div class="card-body">
                        <p class="card-text text-center">Body scan 7 menit (meditasi singkat)</p>
                    </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 my-2">
                <div class="card shadow-sm meditation-card">
                    <img src="{{ asset('img/meditasi (2).png') }}" class="card-img-top" alt="Meditasi Tanpa Panduan">
                    <div class="card-body">
                        <p class="card-text text-center">Meditasi Tanpa Panduan 15 menit</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 my-2">
                <div class="card shadow-sm meditation-card">
                    <img src="{{ asset('img/meditasi (3).png') }}" class="card-img-top" alt="Meditasi Tanpa Musik">
                    <div class="card-body">
                        <p class="card-text text-center">Meditasi Tanpa Musik Panduan 30 menit</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <!-- Lanjutan Video Section -->
            <div class="col-md-4 my-2">
                <div class="card shadow-sm meditation-card">
                    <img src="{{ asset('img/meditasi (4).png') }}" class="card-img-top" alt="Bernafas">
                    <div class="card-body">
                        <p class="card-text text-center">Bernafas 3 menit (meditasi singkat)</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 my-2">
                <div class="card shadow-sm meditation-card">
                    <img src="{{ asset('img/meditasi (5).png') }}" class="card-img-top" alt="Meditasi Tanpa Musik">
                    <div class="card-body">
                        <p class="card-text text-center">Meditasi Tanpa Musik Panduan 15 menit</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 my-2">
                <div class="card shadow-sm meditation-card">
                    <img src="{{ asset('img/meditasi (7).png') }}" class="card-img-top" alt="Meditasi Tanpa Musik">
                    <div class="card-body">
                        <p class="card-text text-center">Meditasi Tanpa Panduan 60 menit</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <h3 class="text-xl">Audio</h3>
            <!-- Audio Section -->
            <div class="col-md-4 my-2">
                <div class="card shadow-sm meditation-card">
                    <a href="meditasiaudio.php">
                    <img src="{{ asset('img/meditasi (6).png') }}" class="card-img-top" alt="Meditasi Semi Guided">
                    <div class="card-body">
                        <p class="card-text text-center">Meditasi Semi Guided 5 menit</p>
                    </div></a>
                </div>
            </div>
            <div class="col-md-4 my-2">
                <div class="card shadow-sm meditation-card">
                    <img src="{{ asset('img/meditasi (5).png') }}" class="card-img-top" alt="Meditasi Tanpa Panduan">
                    <div class="card-body">
                        <p class="card-text text-center">Meditasi Tanpa Panduan 30 menit</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 my-2">
                <div class="card shadow-sm meditation-card">
                    <img src="{{ asset('img/meditasi (3).png') }}" class="card-img-top" alt="Meditasi Tanpa Panduan">
                    <div class="card-body">
                        <p class="card-text text-center">Meditasi Tanpa Panduan 5 menit</p>
                    </div>
                </div>
            </div>

            
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
