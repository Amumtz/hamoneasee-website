<?php

use App\Http\Controllers\api\ArtikelController;
use App\Http\Controllers\api\KonsultasiController;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\api\PodcastController;
use App\Http\Controllers\api\VideoController;
use App\Http\Controllers\api\CommentController;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\PsikologController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);



Route::apiResource('podcast', PodcastController::class);
Route::apiResource('video', VideoController::class);

Route::middleware('auth:sanctum')->post('/konsultasi', [KonsultasiController::class, 'store']);
Route::get('/konsultasi', [KonsultasiController::class, 'index']);
Route::middleware('auth:sanctum')->apiResource('konsultasi', KonsultasiController::class)->except(['index', 'store']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/konsultasi/history', [KonsultasiController::class, 'history']);
    Route::put('/konsultasi/{id}/reschedule', [KonsultasiController::class, 'reschedule']);
    Route::put('/konsultasi/{id}/cancel', [KonsultasiController::class, 'cancel']);

    Route::get('/psikolog',[PsikologController::class, 'daftar'])->name('psikolog.daftar');
    Route::get('/psikolog/{id}', [PsikologController::class, 'deskripsi'])->name('psikolog.show');
});
Route::apiResource('user',UserController::class);


Route::middleware('auth:sanctum')->group(function () {
    // Menampilkan daftar semua artikel
    Route::get('artikel', [ArtikelController::class, 'index']);
    // Menyimpan artikel baru
    Route::post('artikel', [ArtikelController::class, 'store']);
    // Menampilkan detail artikel tertentu
    Route::get('artikel/{artikel}', [ArtikelController::class, 'show']);
    // Memperbarui artikel tertentu
    Route::put('artikel/{artikel}', [ArtikelController::class, 'update']);
    // Menghapus artikel tertentu
    Route::delete('artikel/{artikel}', [ArtikelController::class, 'destroy']);

    Route::get('artikel/{artikel}/comments', [CommentController::class, 'index'])->name('artikel.comments.index');
    // Rute untuk Komentar yang terkait dengan Artikel
    // Komentar disimpan (dibuat) untuk artikel tertentu
    Route::post('artikel/{artikel}/comments', [CommentController::class, 'store'])->name('artikel.comments.store');
    // Memperbarui komentar tertentu (menggunakan ID komentar)
    Route::put('comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
    // Menghapus komentar tertentu (menggunakan ID komentar)
    Route::delete('comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
});