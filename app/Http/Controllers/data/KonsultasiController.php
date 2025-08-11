<?php

namespace App\Http\Controllers\data;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\konsultasi; // Ensure you have the correct namespace for the Konsultasi model

class KonsultasiController extends Controller
{
    public function index(Request $request)
    {
        $konsultasi = konsultasi::with(['psikolog' => function ($query) {
        $query->where('role', 'psikolog');
        },])->get();
        // Logic to retrieve and display consultations
        return view('admin.konsultasi.index',compact('konsultasi'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    // public function detail($id)
    // {
    //     // Logic to display a specific consultation detail
    //     $konsultasi = konsultasi::findOrFail($id);
    //     return view('admin.konsultasi.detail', compact('konsultasi'));
    // }

    // public function create()
    // {
    //     // Logic to show form for creating a new consultation
    //     return view('konsultasi.create');
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'id_psikolog' => 'required|exists:users,id',
    //         'tgl_konsul' => 'required',
    //         'jam_konsul' =>'nullable',
    //     ]);

    //     $konsultasi = new konsultasi();
    //     $konsultasi->id_psikolog = $request->id_psikolog;
    //     $konsultasi->id_client = $request->user()->id; // Assuming the user is authenticated
    //     $konsultasi->tgl_konsul = $request->tgl_konsul;
    //     $konsultasi->jam_konsul = $request->jam_konsul;

    //     $konsultasi->save();
    //     // $konsultasi = konsultasi::create($request->all());

    //     return redirect()->route('user.konsultasi.index')
    //         ->with('success', 'Konsultasi created successfully.');
    // }

    // public function show($id)
    // {
    //     // Logic to display a specific consultation
    //     return view('konsultasi.show', compact('id'));
    // }

    // public function edit($id)
    // {
    //     // Logic to show form for editing a consultation
    //     return view('konsultasi.edit', compact('id'));
    // }

    // public function update(Request $request, $id)
    // {
    //     // Logic to update a specific consultation
    //     // Validate and update the consultation data
    // }

    // public function destroy($id)
    // {
    //     // Logic to delete a specific consultation
    // }
}
