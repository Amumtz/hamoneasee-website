<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Psikolog extends Model
{
    use HasFactory;

    protected $table = 'psikolog'; // Menentukan nama tabel jika berbeda dari konvensi Laravel

    protected $fillable = [
        'user_id',
        'nama_lengkap',
        'nomor_lisensi',
        'gender',
        'usia_range',
        'spesialis',
        'kualifikasi',
        'pengalaman_tahun',
        'jumlah_konsultasi',
        'biaya_konsultasi',
        'deskripsi',
        'penilaian',
        'foto',
    ];

    /**
     * Get the user that owns the psychologist profile.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
