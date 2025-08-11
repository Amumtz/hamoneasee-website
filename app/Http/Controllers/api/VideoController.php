<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\video;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
   public function index()
    {
        return response()->json(Video::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string',
            'deskripsi' => 'required|string',
            'thumbnail' => 'nullable',
            'video' => 'nullable'
        ]);

        $thumbnailPath = $request->file('thumbnail')?->store('thumbnails', 'public');
        $videoPath = $request->file('video')?->store('videos', 'public');

        $video = Video::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'thumbnail' => $thumbnailPath,
            'video_path' => $videoPath
        ]);

        return response()->json($video, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Video $video)
    {
        return response()->json($video);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $video = Video::findOrFail($id);

        $validated = $request->validate([
            'judul' => 'required|string',
            'deskripsi' => 'required|string',
            'thumbnail' => 'nullable',
            'video' => 'nullable'
        ]);

        // return response()->json(['message' => 'Video edited succesfully'], 200);

            if ($request->hasFile('thumbnail')) {
        Storage::disk('public')->delete($video->thumbnail);
        $video->thumbnail = $request->file('thumbnail')->store('thumbnails', 'public');
    }

    // Update video jika file baru dikirim
    if ($request->hasFile('video')) {
        Storage::disk('public')->delete($video->video_path);
        $video->video_path = $request->file('video')->store('videos', 'public');
    }

    $video->save();
    $video->update($validated);
    // return response()->json($video);
    return response()->json(['message' => 'Anda tidak memiliki izin untuk memperbarui komentar ini.'], 404);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $video = Video::findOrFail($id);

        if ($video->thumbnail) {
            Storage::disk('public')->delete($video->thumbnail);
        }
        if ($video->video_path) {
            Storage::disk('public')->delete($video->video_path);
        }

        $video->delete();

        return response()->json(['message' => 'Video deleted successfully'], 200);
    }
}
