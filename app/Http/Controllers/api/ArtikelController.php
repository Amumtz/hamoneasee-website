<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\artikel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;

class ArtikelController extends Controller
{
     public function index(): JsonResponse
    {
        // Mengambil semua artikel dengan relasi user (penulis) dan gambar terkait
        $artikels = artikel::with(['images', 'comments.user:id,name'])->get();
        return response()->json($artikels);
    }

    /**
     * Simpan artikel baru.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        try {
            // Validasi input dari request
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'content' => 'required|string',
                // 'user_id' => 'required|exists:users,id', // Jika Anda mengizinkan user_id di-set manual
                'images' => 'nullable|array', // Memvalidasi bahwa 'images' adalah array (opsional)
                // 'images.*.path' => 'nullable|file|image|mimes:jpg,jpeg,png',
                'images.*.path' => 'nullable|string', // Contoh: jika path dikirim dari frontend sebagai string
                'images.*.caption' => 'nullable|string|max:255',
                'images.*.order' => 'nullable|integer',
            ]);

            // Gunakan ID user yang sedang login sebagai penulis artikel
            // $validatedData['user_id'] = Auth::id(); // Memastikan artikel dibuat oleh user yang sedang login

            // Buat artikel baru
            $artikel = artikel::create($validatedData);

            // Jika ada gambar dalam request, simpan ke tabel artikel_images
            // Di sini, kita akan mensimulasikan penyimpanan file ke public/artikel_image.
            // Dalam implementasi nyata, Anda akan menggunakan Storage::putFileAs() atau sejenisnya
            // untuk mengupload file gambar yang sebenarnya.

            if ($request->has('images') && is_array($request->input('images'))) {
                foreach ($request->images as $imageData) {
            if (isset($imageData['path']) && $imageData['path'] instanceof \Illuminate\Http\UploadedFile) {
                $imagePath = $imageData['path']->store('images', 'public');

                $artikel->images()->create([
                    'path' => $imagePath,
                    'caption' => $imageData['caption'] ?? null,
                    'order' => $imageData['order'] ?? 0,
                ]);
            }

    }
}

            // if ($request->has('images') && is_array($request->input('images'))) {
            //     foreach ($request->input('images') as $imageData) {
            //         // Mensimulasikan path gambar di public/artikel_image
            //         // Dalam aplikasi nyata, Anda akan mengupload file dan mendapatkan path-nya.
            //         // Contoh: $imagePath = $request->file('image_field_name')->store('artikel_image', 'public');
            //         // Untuk tujuan contoh ini, kita membuat path dummy.
            //         $simulatedImagePath = 'artikel_image/' . Str::uuid() . '.jpg'; // Menggunakan UUID untuk nama file unik

            //         $artikel->images()->create([
            //             'path' => $simulatedImagePath, // Menyimpan path ke database
            //             'caption' => $imageData['caption'] ?? null,
            //             'order' => $imageData['order'] ?? 0,
            //         ]);
            //     }
            // }

            return response()->json($artikel, 201); // 201 Created
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422); // 422 Unprocessable Entity
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menyimpan artikel: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Tampilkan detail artikel tertentu.
     *
     * @param artikel $artikel
     * @return JsonResponse
     */
    public function show(artikel $artikel): JsonResponse
    {
        // Mengambil artikel dengan relasi user (penulis), gambar, dan komentar (bersama dengan user penulis komentar)
        return response()->json($artikel->load(['images', 'comments.user:id,name']));
    }

    /**
     * Perbarui artikel tertentu.
     *
     * @param Request $request
     * @param artikel $artikel
     * @return JsonResponse
     */
    public function update(Request $request, artikel $artikel)
    {
        // // Pastikan hanya pemilik artikel yang bisa memperbarui
        // if (Auth::id() !== $artikel->user_id) {
        //     return response()->json(['message' => 'Anda tidak memiliki izin untuk memperbarui artikel ini.'], 403); // 403 Forbidden
        // }

        // try {
        //     // Validasi input
        //     $validatedData = $request->validate([
        //         'title' => 'required|string|max:255',
        //         'content' => 'required|string',
        //     ]);

        //     $artikel->update($validatedData);

        //     return response()->json($artikel->load(['user:id,name', 'images']));
        // } catch (ValidationException $e) {
        //     return response()->json(['errors' => $e->errors()], 422);
        // } catch (\Exception $e) {
        //     return response()->json(['message' => 'Gagal memperbarui artikel: ' . $e->getMessage()], 500);
        // }
    }

    /**
     * Hapus artikel tertentu.
     *
     * @param artikel $artikel
     * @return JsonResponse
     */
    public function destroy(artikel $artikel)#: #JsonResponse
    {
    //     // Pastikan hanya pemilik artikel yang bisa menghapus
    //     if (Auth::id() !== $artikel->user_id) {
    //         return response()->json(['message' => 'Anda tidak memiliki izin untuk menghapus artikel ini.'], 403); // 403 Forbidden
    //     }

    //     try {
    //         $artikel->delete();
    //         return response()->json(['message' => 'Artikel berhasil dihapus.'], 200); // 200 OK
    //     } catch (\Exception $e) {
    //         return response()->json(['message' => 'Gagal menghapus artikel: ' . $e->getMessage()], 500);
    //     }
    // }
    }
}
