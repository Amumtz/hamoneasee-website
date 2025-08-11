<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\ArticleImage;
use App\Models\Comment;

class artikel extends Model
{
    use HasFactory;

    protected $table = 'artikel'; // Nama tabel di database
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'content',
    ];

    /**
     * Get the images for the article.
     */
    public function images(): HasMany
    {
        return $this->hasMany(ArticleImage::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Get the comments for the article.
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
