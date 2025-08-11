<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\artikel;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class CommentController extends Controller
{
    /**
     * Simpan komentar baru untuk artikel tertentu.
     *
     * @param Request $request
     * @param artikel $artikel // Mengambil artikel berdasarkan ID di route
     * @return JsonResponse
     */
    public function store(Request $request, artikel $artikel): JsonResponse
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

            return response()->json($comment, 201); // 201 Created
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422); // 422 Unprocessable Entity
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menyimpan komentar: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Perbarui komentar tertentu.
     *
     * @param Request $request
     * @param Comment $comment
     * @return JsonResponse
     */
    public function update(Request $request, Comment $comment): JsonResponse
    {
        // Hanya pemilik komentar yang bisa memperbarui
        if (Auth::id() !== $comment->user_id) {
            return response()->json(['message' => 'Anda tidak memiliki izin untuk memperbarui komentar ini.'], 403); // 403 Forbidden
        }

        try {
            // Validasi input
            $validatedData = $request->validate([
                'content' => 'required|string|max:1000',
            ]);

            $comment->update($validatedData);

            return response()->json($comment,200);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal memperbarui komentar: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Hapus komentar tertentu.
     *
     * @param Comment $comment
     * @return JsonResponse
     */
    public function destroy(Comment $comment): JsonResponse
    {
        // Hanya pemilik komentar atau penulis artikel terkait yang bisa menghapus
        // Atau seorang admin
        if (Auth::id() !== $comment->user_id) {
            // Anda bisa menambahkan logika role admin di sini: && !Auth::user()->hasRole('admin')
            return response()->json(['message' => 'Anda tidak memiliki izin untuk menghapus komentar ini.'], 403); // 403 Forbidden
        }

        try {
            $comment->delete();
            return response()->json(['message' => 'Komentar berhasil dihapus.'], 200); // 200 OK
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menghapus komentar: ' . $e->getMessage()], 500);
        }
    }

    public function index(Artikel $artikel)
{
    $comments = $artikel->comments()
        ->with('user:id,name') // Include user data
        ->orderBy('created_at', 'desc')
        ->get();

    return response()->json([
        'data' => $comments
    ]);
}
}

