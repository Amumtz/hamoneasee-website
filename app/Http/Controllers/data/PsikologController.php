<?php

namespace App\Http\Controllers\data;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\konsultasi;

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

        return view('user.konsultasi.daftarpsikolog', compact('psikologs'));
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

        if (!$psikolog) {
            abort(404, 'Psikolog tidak ditemukan.');
        }

        return view('user.konsultasi.deskripsipsikolog', compact('psikolog'));
    }
    public function jadwal($id)
    {
        // Pastikan user sudah login
        if (!Auth::check()) {
            return redirect()->route('auth.login');
        }

        // Query data psikolog dan issues
        $psikolog = DB::table('psikolog as p')
            ->select(
                'p.id',
                'p.nama_lengkap',
                'p.foto',
                'p.penilaian',
                'p.pengalaman_tahun',
            )
            ->where('p.id', $id)
            ->groupBy(
                'p.id',
                'p.nama_lengkap',
                'p.foto',
                'p.penilaian',
                'p.pengalaman_tahun'
            )
            ->first();

        if (!$psikolog) {
            abort(404, 'Psikolog tidak ditemukan.');
        }

        return view('user.konsultasi.jadwalpsikolog', compact('psikolog'));
    }
    public function bookingStore(Request $request, $id)
    {
        $data = $request->validate([
            'tanggal' => 'required|date',
            'waktu' => 'required',
        ]);

        $booking = konsultasi::create([
            'id_psikolog' => $id,
            'id_client' => Auth::id(),
            'tgl_konsul' => $data['tanggal'],
            'jam_konsul' => $data['waktu'],
        ]);

        return redirect()->route('pembayaran.show', ['booking' => $booking->id]);
    }
    public function pembayaran($bookingId)
    {
        $booking = konsultasi::with('psikolog')->findOrFail($bookingId);
        return view('user.konsultasi.pembayaran', compact('booking'));
    }
    public function buktiPembayaran(Request $request, $bookingId)
    {
        $booking = konsultasi::with('psikolog')->findOrFail($bookingId);
        // Proses pembayaran jika perlu, lalu tampilkan halaman bukti
        return view('user.konsultasi.buktipembayaran', compact('booking'));
    }

    public function history()
    {
        $booking = konsultasi::where('id_client', Auth::id())
            ->with('psikolog')
            ->orderBy('tgl_konsul', 'desc')
            ->orderBy('jam_konsul', 'desc')
            ->get();

        return view('user.konsultasi.riwayat', compact('booking'));
    }
    public function reschedule(Request $request, $id)
    {
        $booking = konsultasi::findOrFail($id);
        
        // Verify that the booking belongs to the current user
        if ($booking->id_client !== Auth::id()) {
            return back()->with('error', 'Unauthorized action');
        }

        $validated = $request->validate([
            'tgl_konsul' => 'required|date|after:today',
            'jam_konsul' => 'required',
        ]);

        $booking->update($validated);

        return redirect()->route('booking.history')
            ->with('success', 'Jadwal konsultasi berhasil diubah');
    }

    public function cancel($id)
    {
        $booking = konsultasi::findOrFail($id);
        
        // Verify that the booking belongs to the current user
        if ($booking->id_client !== Auth::id()) {
            return back()->with('error', 'Unauthorized action');
        }

        $booking->status = 'cancelled';
        $booking->save();

        return redirect()->route('booking.history')
            ->with('success', 'Konsultasi berhasil dibatalkan');
    }
}
