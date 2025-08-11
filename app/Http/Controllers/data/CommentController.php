<?php

namespace App\Http\Controllers\data;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\artikel;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\RedirectResponse;

class CommentController extends Controller
{
    public function store(Request $request, artikel $artikel): RedirectResponse
    {
        try {
            // Validasi input
            $validatedData = $request->validate([
                'content' => 'required|string|max:1000',
            ]);

            // Buat komentar baru untuk artikel ini, oleh user yang sedang login
            $comment = $artikel->comments()->create([
                'user_id' => Auth::id(), // ID user yang sedang login
                'content' => $validatedData['content'],
            ]);

            // Redirect ke halaman detail artikel setelah berhasil menyimpan komentar
            return redirect()->route('artikel.show', $artikel->id)->with('success', 'Komentar berhasil ditambahkan!');
        } catch (ValidationException $e) {
            // Jika ada error validasi, redirect kembali dengan input lama dan error
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            // Tangani error umum
            return redirect()->back()->with('error', 'Gagal menyimpan komentar: ' . $e->getMessage());
        }
    }

    /**
     * Perbarui komentar tertentu.
     *
     * @param Request $request
     * @param Comment $comment
     * @return RedirectResponse
     */
    public function update(Request $request, Comment $comment): RedirectResponse
    {
        // Hanya pemilik komentar yang bisa memperbarui
        if (Auth::id() !== $comment->user_id) {
            return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk memperbarui komentar ini.');
        }

        try {
            // Validasi input
            $validatedData = $request->validate([
                'content' => 'required|string|max:1000',
            ]);

            $comment->update($validatedData);

            // Redirect kembali ke halaman artikel setelah berhasil diperbarui
            // Menggunakan $comment->artikel_id untuk mendapatkan ID artikel dari komentar yang diperbarui
            return redirect()->route('artikel.show', $comment->artikel_id)->with('success', 'Komentar berhasil diperbarui!');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception | \Throwable $e) { // Tangkap Throwable juga untuk error yang lebih luas
            return redirect()->back()->with('error', 'Gagal memperbarui komentar: ' . $e->getMessage());
        }
    }

    /**
     * Hapus komentar tertentu.
     *
     * @param Comment $comment
     * @return RedirectResponse
     */
    public function destroy(Comment $comment): RedirectResponse
    {
        // Hanya pemilik komentar atau penulis artikel terkait yang bisa menghapus
        // Pastikan relasi 'artikel' ada di model Comment jika belum.
        // Jika ada role admin, tambahkan: || Auth::user()->hasRole('admin')
        if (Auth::id() !== $comment->user_id && Auth::id() !== $comment->artikel->user_id) {
            return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk menghapus komentar ini.');
        }

        try {
            $comment->delete();
            // Redirect kembali ke halaman artikel setelah penghapusan
            return redirect()->route('artikel.show', $comment->artikel_id)->with('success', 'Komentar berhasil dihapus.');
        } catch (\Exception | \Throwable $e) { // Tangkap Throwable juga
            return redirect()->back()->with('error', 'Gagal menghapus komentar: ' . $e->getMessage());
        }
    }
}
