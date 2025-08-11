<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\data\PodcastController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\data\ArtikelController;
use App\Http\Controllers\data\KonsultasiController;
use App\Http\Controllers\data\PsikologController;
use App\Http\Controllers\data\CommentController;
use App\Models\Psikolog;

Route::get('/', function () {
    return view('welcome');
});

//login manual
Route::get('/login', [AuthController::class, 'showLogin'])->name('auth.login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('auth.register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

//login google
Route::get('oauth/google', [AuthController::class, 'redirectToProvider'])->name('oauth.google');  
Route::get('oauth/google/callback', [AuthController::class, 'handleProviderCallback'])->name('oauth.google.callback');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


// User Routes
Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
Route::get('/user/meditasi',[UserController::class, 'meditasi'])->name('user.meditasi');
Route::get('/user/ruangedukasi', [UserController::class, 'ruangedukasi'])->name('user.ruangedukasi');
Route::get('/user/artikel', [UserController::class, 'artikel'])->name('user.artikel');
// Route::get('/user/artikel/detail', [UserController::class, 'artikelDetail'])->name('user.artikel.detail');
Route::get('/user/podcast', [UserController::class, 'podcast'])->name('user.podcast');
Route::get('/user/podcast/detail', [PodcastController::class, 'show'])->name('user.podcast.detail');
Route::get('/user/video', [UserController::class, 'video'])->name('user.video');
Route::get('/user/video/kategori', [UserController::class, 'videoDetail'])->name('user.video.kategori');
Route::get('/user/tesKesehatan', [UserController::class, 'tesKesehatan'])->name('user.tesKesehatan');



Route::get('/user/artikel/{artikel}', [ArtikelController::class, 'show'])->name('artikel.show');
Route::put('comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
    // Menghapus komentar tertentu (menggunakan ID komentar)
    Route::delete('comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

// Rute untuk submit komentar dari form web (akan memanggil store di CommentController API)
// Ini adalah POST request ke endpoint API.
// Karena kita menggunakan middleware 'web' secara default, CSRF token akan otomatis ditangani.
// Pastikan user terautentikasi melalui sistem autentikasi web Laravel (mis. Breeze/Jetstream)
// agar Auth::id() di CommentController::store tidak null.
Route::post('artikel/{artikel}/comments', [CommentController::class, 'store'])->name('artikel.comments.store');


Route::resource('user/konsultasi', KonsultasiController::class)->names([
    'index' => 'user.konsultasi.index',
    'create' => 'user.konsultasi.create',
    'store' => 'user.konsultasi.store',
    'edit' => 'user.konsultasi.edit',
    'update' => 'user.konsultasi.update',
    'destroy' => 'user.konsultasi.destroy'
]);

// route proses booking
Route::get('/user/konsultasi/', [PsikologController::class, 'daftar'])->name('psikolog.daftar');
Route::get('/konsultasi/deskripsipsikolog/{id}', [PsikologController::class, 'deskripsi'])->name('psikolog.deskripsi');
Route::get('/konsultasi/jadwalpsikolog/{id}', [PsikologController::class, 'jadwal'])->name('psikolog.jadwal');
Route::post('/booking/{id}', [PsikologController::class, 'bookingStore'])->name('booking.store');
Route::get('/pembayaran/{booking}', [PsikologController::class, 'pembayaran'])->name('pembayaran.show');
Route::post('/pembayaran/{booking}', [PsikologController::class, 'buktiPembayaran'])->name('bukti.pembayaran');
Route::get('/booking/history', [PsikologController::class, 'history'])->name('booking.history');
Route::put('/booking/{id}/reschedule', [PsikologController::class, 'reschedule'])->name('booking.reschedule');
Route::delete('/booking/{id}/cancel', [PsikologController::class, 'cancel'])->name('booking.cancel');











// Admin Routes
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::resource('admin/podcast',PodcastController::class)->names([
    'index' => 'admin.podcast.index',
    'create' => 'admin.podcast.create',
    'store' => 'admin.podcast.store',
    'edit' => 'admin.podcast.edit',
    'update' => 'admin.podcast.update',
    'destroy' => 'admin.podcast.destroy'
]);// Ensure you have the correct middleware for admin routes


Route::resource('admin/konsultasi',KonsultasiController::class)->names([
    'index' => 'admin.konsultasi.index',
    'create' => 'admin.konsultasi.create',
    'store' => 'admin.konsultasi.store',
    'edit' => 'admin.konsultasi.edit',
    'update' => 'admin.konsultasi.update',
    'destroy' => 'admin.konsultasi.destroy'
]);// Ensure you have the correct middleware for admin routes