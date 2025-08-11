<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Podcast;
use Illuminate\Support\Facades\Storage;

class PodcastController extends Controller
{
    public function index()
    {
        return response()->json(Podcast::all());
    }
    public function create(Request $request)
    {
        //no views in API controller
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'pembicara' => 'nullable|string',
            'audio' => 'nullable',
            'image' => 'nullable',
            'tgl_publikasi' => 'nullable|date',
        ]);

        $data = $request->only(['judul', 'pembicara', 'tgl_publikasi']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('image', 'public');
        }

        if ($request->hasFile('audio')) {
            $data['audio'] = $request->file('audio')->store('audio', 'public');
        }

        $podcast = Podcast::create($data);
        return response()->json($podcast, 201);
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Podcast $podcast)
    {
        return response()->json($podcast);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, Request $request)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $podcast = Podcast::findOrFail($id);

        $request->validate([
            'judul' => 'sometimes|required|string|max:255',
            'pembicara' => 'nullable|string',
            'audio' => 'nullable',
            'image' => 'nullable',
            'tgl_publikasi' => 'nullable|date',
        ]);

        $data = $request->only(['judul', 'pembicara', 'tgl_publikasi']);

        if ($request->hasFile('image')) {
            if ($podcast->image) Storage::disk('public')->delete($podcast->image);
            $data['image'] = $request->file('image')->store('image', 'public');
        }

        if ($request->hasFile('audio')) {
            if ($podcast->audio) Storage::disk('public')->delete($podcast->audio);
            $data['audio'] = $request->file('audio')->store('audios', 'public');
        }

        $podcast->update($data);
        return response()->json($podcast);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $podcast = Podcast::findOrFail($id);
        
        if ($podcast->image) {
            Storage::disk('public')->delete($podcast->image);
        }
        
        if ($podcast->audio) {
            Storage::disk('public')->delete($podcast->audio);
        }

        $podcast->delete();
        return response()->json(['message' => 'Podcast deleted successfully'], 204);
    }
}
