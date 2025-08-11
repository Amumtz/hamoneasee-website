<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\konsultasi; // Ensure you have the correct namespace for the Konsultasi model
use Illuminate\Support\Facades\Auth;

class KonsultasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $konsultasi = konsultasi::with(['psikolog' => function ($query) {
            $query->where('role', 'psikolog');
        }, 'klien' => function ($query) {
            $query->where('role', 'user');
        }])->get();

        return response()->json([
            'status' => 'success',
            'data' => $konsultasi,
        ], 200);

    }

    /**
     * Show the form for creating a new resource.
     */
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_psikolog' => 'required|exists:users,id',
            'tgl_konsul' => 'required',
            'jam_konsul' =>'nullable',
        ]);

        $konsultasi = new konsultasi();
        $konsultasi->id_psikolog = $request->id_psikolog;
        $konsultasi->id_client = $request->user()->id; // Assuming the user is authenticated
        $konsultasi->tgl_konsul = $request->tgl_konsul;
        $konsultasi->jam_konsul = $request->jam_konsul;

        $konsultasi->save();
        // $konsultasi = konsultasi::create($request->all());

        return response()->json([
            'status' => 'success',
            'data' => $konsultasi,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        $konsultasi = Konsultasi::where('id_client', $id)->get();
        return response()->json([
            'status' => 'success',
            'data' => $konsultasi,
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tgl_konsul' => 'required',
            'jam_konsul' => 'nullable',
        ]);

        $konsultasi = konsultasi::findOrFail($id);

        $konsultasi->tgl_konsul = $request->tgl_konsul;
        $konsultasi->jam_konsul = $request->jam_konsul;

        $konsultasi->save();

        return response()->json([
            'status' => 'success',
            'data' => $konsultasi,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $konsultasi = konsultasi::findOrFail($id);
        $konsultasi->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Konsultasi deleted successfully',
        ], 200);
    }

    /**
     * Get consultation history for authenticated user
     */
    public function history(Request $request, string $id)
    {
        $konsultasi = Konsultasi::where('id_client', $id)->get();
        return response()->json([
            'status' => 'success',
            'data' => $konsultasi,
        ], 200);
    }

    /**
     * Reschedule consultation
     */
    public function reschedule(Request $request, string $id)
    {
        $request->validate([
            'tgl_konsul' => 'required|date|after:today',
            'jam_konsul' => 'required',
        ]);

        $konsultasi = konsultasi::findOrFail($id);

        // Check if consultation belongs to authenticated user
        if ($konsultasi->id_client !== $request->user()->id) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized action',
            ], 403);
        }

        // Check if consultation is pending
        if ($konsultasi->status !== 'pending') {
            return response()->json([
                'status' => 'error',
                'message' => 'Only pending consultations can be rescheduled',
            ], 400);
        }

        $konsultasi->tgl_konsul = $request->tgl_konsul;
        $konsultasi->jam_konsul = $request->jam_konsul;
        $konsultasi->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Consultation rescheduled successfully',
            'data' => $konsultasi,
        ], 200);
    }

    /**
     * Cancel consultation
     */
    public function cancel(Request $request, string $id)
    {
        $konsultasi = konsultasi::findOrFail($id);

        // Check if consultation belongs to authenticated user
        if ($konsultasi->id_client !== $request->user()->id) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized action',
            ], 403);
        }

        // Check if consultation is pending
        if ($konsultasi->status !== 'pending') {
            return response()->json([
                'status' => 'error',
                'message' => 'Only pending consultations can be cancelled',
            ], 400);
        }

        $konsultasi->status = 'cancelled';
        $konsultasi->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Consultation cancelled successfully',
            'data' => $konsultasi,
        ], 200);
    }
}
