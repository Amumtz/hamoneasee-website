<?php

namespace App\Http\Controllers\data;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Podcast; // Ensure you have the correct namespace for the Podcast model
use Illuminate\Support\Facades\Storage; // If you need to handle file storage

class PodcastController extends Controller
{
    public function index(Request $request)
    {
        $podcast = Podcast::all();
        if($request->has('search')) {
            $podcast = Podcast::where('judul','LIKE','%'.$request->search.'%')->get();
        }
        return view('admin.podcast.index',compact('podcast'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        return view('admin.podcast.create');
    }

    
    public function store(Request $request)
    {
        // dd(ini_get('upload_max_filesize'), ini_get('post_max_size'));
        $request->validate([
            'judul' => 'required',
            'pembicara' => 'required',
            'audio' => '',
            'image' => '',
            'tgl_publikasi' => ''
        ]);

        $input = $request->all();

        if ($audio = $request->file('audio')) {
            $destinationPath = 'audio/';
            $profileAudio = date('YmdHis') . "." . $audio->getClientOriginalExtension();
            $audio->move($destinationPath, $profileAudio);
            $input['audio'] = "$profileAudio";
        }

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        Podcast::create($input);
        $podcast = Podcast::all();
        return view('admin.podcast.index',compact('podcast'))
        ->with('i', (request()->input('page', 1) - 1) * 5);

    }
    /**

     * Display the specified resource.

     *

     * @param  \App\Podcast  $podcast

     * @return \Illuminate\Http\Response

     */

    public function show(Podcast $podcast)
    {
        $podcast = Podcast::all();
        return view('user.ruangEdukasi.podcast.detail',compact('podcast'));
    }
    /**

     * Show the form for editing the specified resource.

     *

     * @param  \App\Podcast  $podcast

     * @return \Illuminate\Http\Response

     */

    public function edit(Podcast $podcast)
    {
        return view('admin.podcast.edit',compact('podcast'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Podcast  $podcast
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Podcast $podcast)
    {
        $request->validate([
            'judul' => 'required',
            'pembicara' => 'required',
            'audio' => '|mimes:mp3,wav,ogg|max:10000',
            'image' => '|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'tgl_publikasi' => ''
        ]);

        $input = $request->all();

        if ($audio = $request->file('audio')) {
            $destinationPath = 'audio/';
            $profileAudio = date('YmdHis') . "." . $audio->getClientOriginalExtension();
            $audio->move($destinationPath, $profileAudio);
            $input['audio'] = "$profileAudio";
        }

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";

        }else{
            unset($input['image']);
        }

        $podcast->update($input);
        return redirect()->view('admin.podcast.index')->with('success','Podcast updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Podcast  $podcast
     * @return \Illuminate\Http\Response
     */
    public function destroy(Podcast $podcast)
    {
        $podcast->delete();
        return redirect()->view('admin.podcast.index')
                        ->with('success','Podcast deleted successfully');
    }

}
