@extends('user.layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Pastikan path ke styles.css Anda benar. Jika di folder public, gunakan asset() -->
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <title>{{ $artikel->title ?? 'Artikel' }}</title> <!-- Judul artikel dinamis, dengan fallback -->
    @include('user.partials.header')
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <header id="header-placeholder" class=" bg-white mt-0 shadow z-50">
        <!-- Pastikan path ke header.js Anda benar. Jika di folder public, gunakan asset() -->
        <script src="{{ asset('header.js') }}"></script>
    </header>

    <div class="mt-32 mx-16 w-5/6">
        <h1 class="text-2xl font-bold">{{ $artikel->title ?? 'Judul Tidak Tersedia' }}</h1>
        <p class="text-md text-gray-500 font-medium mt-2">Author : {{ $artikel->user->name ?? 'Pengguna Tidak Dikenal' }} pada {{ $artikel->created_at?->format('d M Y') }}</p>
        <!-- Menggunakan gambar cover artikel pertama dari relasi images, jika ada.
             Jika tidak ada, pakai fallback gambar statis Anda. -->
        @if($artikel->images->isNotEmpty())
            {{-- Menggunakan gambar pertama dari koleksi images sebagai cover --}}
            <img src="{{ asset($artikel->images->first()->path) }}" alt="{{ $artikel->images->first()->caption ?? 'Cover Artikel' }}" class="mt-16 w-full h-80 object-cover rounded-md" onerror="this.onerror=null;this.src='{{ asset('img/aertikel (2).png') }}';"> {{-- PERUBAHAN DI SINI --}}
        @else
            {{-- Fallback jika tidak ada gambar yang terkait dengan artikel --}}
            <img src="{{ asset('img/aertikel (2).png') }}" alt="Cover Artikel Default" class="mt-16 w-full h-80 object-cover rounded-md">
        @endif
    </div>

    <div class="mt-5 mx-16">
        <div class="text-wrap mr-16 ">
            {!! $artikel->content ?? 'Konten artikel tidak tersedia.' !!} 
            {{-- <!-- Menggunakan {!! !!} untuk render HTML dari kolom content --> --}}
        </div>
    </div>

    <!-- Bagian gambar artikel lainnya -->
    {{-- Menampilkan gambar-gambar lain selain gambar pertama (yang diasumsikan sebagai cover) --}}
    @if($artikel->images->count() > 1)
        <div class="flex my-5 ml-20 mr-36 h-64 justify-center max-md:ml-0 max-md:w-full max-md:flex-wrap">
            @foreach($artikel->images->skip(1) as $image) {{-- Lewati gambar pertama (cover) --}}
                <img src="{{ asset('img/'.$image->path) }}" alt="{{ $image->caption ?? 'Gambar Artikel' }}" class="w-3/6 mr-2 max-md:mb-5 max-md:h-40" onerror="this.onerror=null;this.src='https://placehold.co/400x200/cccccc/333333?text=Gambar+Tidak+Tersedia';"> {{-- PERUBAHAN DI SINI --}}
            @endforeach
        </div>
    @elseif($artikel->images->count() == 1)
        {{-- Jika hanya ada satu gambar (yang sudah jadi cover), tampilkan placeholder statis jika perlu --}}
        <div class="flex my-5 ml-20 mr-36 h-64 justify-center max-md:ml-0 max-md:w-full max-md:flex-wrap">
            <img src="{{asset ('img/isiartikel (2).png') }}" alt="" class="w-3/6 mr-2 max-md:mb-5 max-md:h-40">
            <img src="{{asset ('img/isiartikel (2).png') }}" alt="" class="w-3/6 ml-2 max-md:mb-5 max-md:h-40 max-md:ml-0">
        </div>
    @else
        {{-- Jika tidak ada gambar sama sekali, tampilkan dua placeholder statis --}}
        <div class="flex my-5 ml-20 mr-36 h-64 justify-center max-md:ml-0 max-md:w-full max-md:flex-wrap">
            <img src="{{asset ('img/isiartikel (2).png') }}" alt="" class="w-3/6 mr-2 max-md:mb-5 max-md:h-40">
            <img src="{{asset ('img/isiartikel (2).png') }}" alt="" class="w-3/6 ml-2 max-md:mb-5 max-md:h-40 max-md:ml-0">
        </div>
    @endif


    <!-- Kolom Komentar -->
    <div class="my-5 mx-16 max-md:mt-24">
        <h2 class="font-bold text-2xl mb-5">Komentar ({{ $artikel->comments->count() }})</h2>

        <!-- Form Komentar -->
        {{-- Pastikan $artikel ada dan memiliki ID sebelum membuat form --}}
        @isset($artikel)
            @if(!is_null($artikel->id))
                <form action="{{ route('artikel.comments.store', $artikel->id) }}" method="POST">
                    @csrf <!-- Laravel CSRF token untuk keamanan form -->
                    <div class="w-9/12 ml-16 mt-4 mb-4 border border-gray-200 rounded-lg bg-gray-50">
                        <div class="px-4 py-2 bg-white rounded-t-lg">
                            <label for="comment" class="sr-only">Your comment</label>
                            <textarea id="comment" name="content" rows="4" class="w-full px-0 text-sm text-gray-900 bg-white border-0" placeholder="Write a comment..." required></textarea>
                        </div>
                        <div class="flex items-center justify-between px-3 py-2 border-t">
                            <button type="submit" name="add_comment" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 hover:bg-blue-800">
                                Post comment
                            </button>
                        </div>
                    </div>
                </form>
            @else
                <p class="ml-16 text-gray-600">Artikel tidak ditemukan atau ID artikel tidak valid, tidak bisa memposting komentar.</p>
            @endif
        @else
            <p class="ml-16 text-gray-600">Artikel tidak ditemukan, tidak bisa memposting komentar.</p>
        @endisset


        <!-- Daftar Komentar -->
        <div class="ml-16 mr-24 my-10">
            @forelse($artikel->comments as $comment)
                <div class="relative p-4 mb-4 bg-white rounded-lg shadow-md border border-gray-200">
                    <div class="flex items-center mb-2">
                        <div class="w-8 h-8 rounded-full bg-gray-400 flex items-center justify-center text-white font-bold text-sm mr-3">
                            {{ substr($comment->user->name ?? '?', 0, 1) }}
                        </div>
                        <div>
                            <p class="text-gray-900 font-semibold">{{ $comment->user->name ?? 'Pengguna Tak Dikenal' }}</p>
                            <p class="text-gray-500 text-xs">{{ $comment->created_at?->format('d M Y, H:i') }}</p>
                        </div>
                    </div>
                    <p class="text-gray-800 leading-snug">{{ $comment->content }}</p>

                    @auth {{-- Pastikan user sedang login --}}
                        @if(Auth::id() === $comment->user_id)
                            <div class="mt-3 text-right">
                                <!-- Tombol Edit: Ini akan memerlukan JavaScript/AJAX untuk fungsionalitas penuh -->
                                <button type="button" class="text-blue-500 hover:text-blue-700 text-sm mr-2" onclick="showEditForm({{ $comment->id }}, '{{ addslashes($comment->content) }}')">Edit</button>
                                <!-- Form Hapus: Menggunakan form tersembunyi untuk DELETE request -->
                                <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus komentar ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 text-sm">Hapus</button>
                                </form>
                            </div>
                        @endif
                    @endauth

                    <!-- Form Edit Komentar (sembunyi secara default) -->
                    <div id="edit-form-{{ $comment->id }}" class="hidden mt-4 p-3 bg-gray-100 rounded-lg">
                        <form action="{{ route('comments.update', $comment->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <textarea name="content" rows="3" class="w-full px-2 py-1 text-sm text-gray-900 bg-white border border-gray-300 rounded-lg" required>{{ $comment->content }}</textarea>
                            <div class="flex justify-end mt-2">
                                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white text-xs font-bold py-1 px-3 rounded-lg mr-2">Simpan</button>
                                <button type="button" onclick="hideEditForm({{ $comment->id }})" class="bg-gray-500 hover:bg-gray-600 text-white text-xs font-bold py-1 px-3 rounded-lg">Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-gray-600 text-center py-4">Belum ada komentar untuk artikel ini.</p>
            @endforelse
        </div>
    </div>

    <!-- Artikel Terkait (placeholder statis Anda) -->
    <div class="my-5 mx-16 max-md:mt-24">
        <p class="font-bold text-2xl mb-5">Artikel Terkait</p>
        <div class="max-w-7xl px-1 py-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                <!-- Kartu Artikel -->
                <div class="text-left">
                    <div class="bg-gray-300 rounded-lg w-full h-44"><img src="{{asset ('img/artikel (2).png') }}" alt=""></div>
                    <h3 class="mt-4 text-md font-semibold">Meningkatkan Rasa Percaya Diri: Langkah-langkah Praktis</h3>
                </div>
                <div class="text-left">
                    <div class="bg-gray-300 rounded-lg w-full h-44"><img src="{{asset ('img/aertikel (2).png') }}" alt=""></div>
                    <h3 class="mt-4 text-md font-semibold">Meningkatkan Rasa Percaya Diri: Langkah-langkah Praktis</h3>
                </div>
                <div class="text-left">
                    <div class="bg-gray-300 rounded-lg w-full h-44"><img src="{{asset ('img/artikel (2).png') }}" alt=""></div>
                    <h3 class="mt-4 text-md font-semibold">Meningkatkan Rasa Percaya Diri: Langkah-langkah Praktis</h3>
                </div>
                <div class="text-left">
                    <div class="bg-gray-300 rounded-lg w-full h-44"><img src="{{asset ('img/artikel (2).png') }}" alt=""></div>
                    <h3 class="mt-4 text-md font-semibold">Meningkatkan Rasa Percaya Diri: Langkah-langkah Praktis</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer statis Anda -->
    <footer class="bg-gray-100/50 my-20">
        <div class="container-fluid px-4 pt-5 lg:px-4">
            <!-- Logo dan Navigasi -->
            <div class="grid grid-cols-1 md:grid-cols-5 gap-2">
                <div class="col-span-1 md:col-span-1 mb-6 flex items-center">
                    <img src="{{ asset('img/logo.png') }}" alt="Logo Perusahaan" class="w-16 h-16">
                    <h1 class="text-2xl ml-2 text-gray-900 font-medium text-center">HarmonEasee</h1>
                </div>
                <div class="col-span-1 ml-10 mb-6">
                    <h3 class="text-xl font-semibold mb-4">Company</h3>
                    <ul class="space-y-2">
                        <li><a href="aboutus.php" class="text-gray-400 hover:text-gray-700">About Us</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-gray-700">Careers</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-gray-700">Our Story</a></li>
                    </ul>
                </div>
                <div class="col-span-1 mb-6">
                    <h3 class="text-xl font-semibold mb-4">Services</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-gray-700">Consulting</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-gray-700">Support</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-gray-700">Custom Solutions</a></li>
                    </ul>
                </div>
                <div class="col-span-1 mb-6">
                    <h3 class="text-xl font-semibold mb-4">Resources</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-gray-700">Blog</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-gray-700">Guides</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-gray-700">FAQs</a></li>
                    </ul>
                </div>
                <div class="col-span-1 mb-6 flex flex-col items-start">
                    <h3 class="text-xl font-semibold mb-4">Follow Us</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-gray-900">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-gray-900">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-gray-900">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-gray-900">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="mt-8 text-center">
                <p class="text-sm text-gray-500">© 2024 HarmonEase. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <!-- JavaScript untuk fungsionalitas Edit Komentar -->
    <script>
        function showEditForm(commentId, currentContent) {
            const form = document.getElementById(`edit-form-${commentId}`);
            form.classList.remove('hidden');
            form.querySelector('textarea[name="content"]').value = currentContent;
        }

        function hideEditForm(commentId) {
            const form = document.getElementById(`edit-form-${commentId}`);
            form.classList.add('hidden');
        }
    </script>
</body>
</html>
@endsection
