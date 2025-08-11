<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class video extends Model
{
    protected $table = 'video';
    protected $fillable = [
        'judul',
        'deskripsi',
        'thumbnail',
        'video_path',
    ];
}
