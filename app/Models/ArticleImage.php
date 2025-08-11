<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class ArticleImage extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'article_images'; // Sesuaikan nama tabel jika berbeda dari konvensi Laravel

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'artikel_id',
        'path',
        'caption',
        'order',
    ];

    /**
     * Get the article that owns the image.
     */
    public function article(): BelongsTo
    {
        return $this->belongsTo(artikel::class);
    }
}
