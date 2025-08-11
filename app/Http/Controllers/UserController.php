<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
        public function dashboard()
    {
        $totalUsers = User::count(); // Total all users
        $countUser = User::where('role', 'user')->count(); // Count clients
        $countPsikolog = User::where('role', 'psikolog')->count(); // Count psychologists
        
        return view('user.dashboard.index', compact('totalUsers', 'countUser', 'countPsikolog'));
    }

    public function meditasi()
    {
        // if (!session()->has('id') || session('role') !== 'user') {
        //     return redirect()->route('auth.login')->withErrors(['unauthorized' => 'Akses ditolak!']);
        // }

        // Tampilkan halaman meditasi
        return view('user.meditasi.index');
    }

    public function tesKesehatan()
    {
        // if (!session()->has('id') || session('role') !== 'user') {
        //     return redirect()->route('auth.login')->withErrors(['unauthorized' => 'Akses ditolak!']);
        // }

        // Tampilkan halaman tes kesehatan
        return view('user.tes.index');
    }
    public function konsultasi()
    {
        // if (!session()->has('id') || session('role') !== 'user') {
        //     return redirect()->route('auth.login')->withErrors(['unauthorized' => 'Akses ditolak!']);
        // }

        // Tampilkan halaman konsultasi
        return view('user.konsultasi.daftarpsikolog');
    }

    public function ruangedukasi()
    {
        // if (!session()->has('id') || session('role') !== 'user') {
        //     return redirect()->route('auth.login')->withErrors(['unauthorized' => 'Akses ditolak!']);
        // }

        // Tampilkan halaman ruang edukasi
        return view('user.ruangEdukasi.index');
    }
    public function artikel()
    {
        // if (!session()->has('id') || session('role') !== 'user') {
        //     return redirect()->route('auth.login')->withErrors(['unauthorized' => 'Akses ditolak!']);
        // }

        // Tampilkan halaman artikel
        return view('user.ruangEdukasi.artikel.index');
    }

    public function artikelDetail()
    {
        // if (!session()->has('id') || session('role') !== 'user') {
        //     return redirect()->route('auth.login')->withErrors(['unauthorized' => 'Akses ditolak!']);
        // }

        // Tampilkan detail artikel berdasarkan ID
        return view('user.ruangEdukasi.artikel.detail');
    }

    public function video()
    {
        // if (!session()->has('id') || session('role') !== 'user') {
        //     return redirect()->route('auth.login')->withErrors(['unauthorized' => 'Akses ditolak!']);
        // }

        // Tampilkan halaman video
        return view('user.ruangEdukasi.video.index');
    }

    public function videoDetail()
    {
        // if (!session()->has('id') || session('role') !== 'user') {
        //     return redirect()->route('auth.login')->withErrors(['unauthorized' => 'Akses ditolak!']);
        // }

        // Tampilkan detail video berdasarkan ID
        return view('user.ruangEdukasi.video.kategorivideo');
    }
    public function podcast()
    {
        // if (!session()->has('id') || session('role') !== 'user') {
        //     return redirect()->route('auth.login')->withErrors(['unauthorized' => 'Akses ditolak!']);
        // }

        // Tampilkan halaman podcast
        return view('user.ruangEdukasi.podcast.index');
    }
    public function podcastDetail()
    {
        // if (!session()->has('id') || session('role') !== 'user') {
        //     return redirect()->route('auth.login')->withErrors(['unauthorized' => 'Akses ditolak!']);
        // }

        // Tampilkan detail podcast berdasarkan ID
        return view('user.ruangEdukasi.podcast.detail');
    }
}
