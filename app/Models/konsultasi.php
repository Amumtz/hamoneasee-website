<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User; // Ensure you have the correct namespace for the User model

class konsultasi extends Model
{

    protected $table = 'konsultasi';

    protected $fillable = [
        'id_psikolog',
        'id_client',
        'tgl_konsul',
        'jam_konsul',
        'status',
    ];
    public function psikolog()
    {
        return $this->belongsTo(User::class, 'id_psikolog')->where('role', 'psikolog');
    }

    public function klien()
    {
        return $this->belongsTo(User::class, 'id_client')->where('role', 'user');
    }
}
