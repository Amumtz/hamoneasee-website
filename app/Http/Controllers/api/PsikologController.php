<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\konsultasi;
use App\Models\Psikolog; // Ensure you have the correct namespace for the Psikolog model

class PsikologController extends Controller
{

    public function daftar(Request $request)
    {
        // Ambil filter dari request
        $filterSpesialis = $request->spesialis !== 'all' ? $request->spesialis : null;
        $filterPenilaian = $request->penilaian !== 'all' ? $request->penilaian : null;
        $filterBiaya = $request->biaya_konsultasi !== 'all' ? $request->biaya_konsultasi : null;

        // Query builder
        $psikologs = DB::table('psikolog as p')
            ->select(
                'p.id',
                'p.nama_lengkap',
                'p.nomor_lisensi',
                'p.gender',
                'p.usia_range',
                'p.spesialis',
                'p.kualifikasi',
                'p.pengalaman_tahun',
                'p.biaya_konsultasi',
                'p.deskripsi',
                'p.penilaian',
                'p.jumlah_konsultasi',
                'p.foto',
            )
            ->when($filterSpesialis, fn($q) => $q->where('p.spesialis', $filterSpesialis))
            ->when($filterPenilaian, fn($q) => $q->where('p.penilaian', '>=', (float)$filterPenilaian))
            ->when($filterBiaya, function($q) use ($filterBiaya) {
                if ($filterBiaya == 'low') $q->where('p.biaya_konsultasi', '<', 50000);
                elseif ($filterBiaya == 'medium') $q->whereBetween('p.biaya_konsultasi', [50000, 100000]);
                elseif ($filterBiaya == 'high') $q->where('p.biaya_konsultasi', '>', 100000);
            })
            ->groupBy(
                'p.id',
                'p.nama_lengkap',
                'p.nomor_lisensi',
                'p.gender',
                'p.usia_range',
                'p.spesialis',
                'p.kualifikasi',
                'p.pengalaman_tahun',
                'p.biaya_konsultasi',
                'p.deskripsi',
                'p.penilaian',
                'p.jumlah_konsultasi',
                'p.foto'
            )
            ->get();

            foreach ($psikologs as $psikolog) {
                $psikolog->foto = $psikolog->foto
                    ? asset('img/foto_psikolog/' . $psikolog->foto)
                    : null;
            }
        return response()->json([
            'status' => 'success',
            'data' => $psikologs,
        ], 200);


    }

    public function deskripsi($id)
    {
        $psikolog = DB::table('psikolog as p')
            ->select(
                'p.id',
                'p.nama_lengkap',
                'p.nomor_lisensi',
                'p.gender',
                'p.usia_range',
                'p.spesialis',
                'p.kualifikasi',
                'p.pengalaman_tahun',
                'p.biaya_konsultasi',
                'p.deskripsi',
                'p.penilaian',
                'p.jumlah_konsultasi',
                'p.foto',
            )
            ->where('p.id', $id)
            ->groupBy(
                'p.id',
                'p.nama_lengkap',
                'p.nomor_lisensi',
                'p.gender',
                'p.usia_range',
                'p.spesialis',
                'p.kualifikasi',
                'p.pengalaman_tahun',
                'p.biaya_konsultasi',
                'p.deskripsi',
                'p.penilaian',
                'p.jumlah_konsultasi',
                'p.foto'
            )
            ->first();
        if ($psikolog && $psikolog->foto) {
                $psikolog->foto = asset('img/foto_psikolog/' . $psikolog->foto);
            }

        if (!$psikolog) {
            return response()->json([
                'status' => 'error',
                'message' => 'Psikolog tidak ditemukan.',
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $psikolog,
        ], 200);
    }
}
