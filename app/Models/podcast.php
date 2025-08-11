<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Podcast extends Model
{
    use HasFactory;

    protected $table = 'podcast';

    protected $fillable = [
        'judul',
        'pembicara',
        'audio',
        'image',
        'tgl_publikasi'
    ];
}
