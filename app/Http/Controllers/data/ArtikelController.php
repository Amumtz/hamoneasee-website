<?php

namespace App\Http\Controllers\data;

use App\Http\Controllers\Controller;
use App\Models\artikel;
use Illuminate\View\View;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function show(artikel $artikel)
    {
        // Memuat artikel dengan relasi user (penulis artikel), gambar, dan komentar.
        // Untuk komentar, kita juga memuat relasi user (penulis komentar)
        // untuk mendapatkan nama penulis komentar.
        // Pastikan relasi 'user', 'images', dan 'comments' telah didefinisikan dengan benar di model artikel Anda.
        $artikel->load(['images', 'comments.user:id,name']);

        // Mengirim data artikel ke view
        return view('user.ruangEdukasi.artikel.detail', compact('artikel'));
    }
}
