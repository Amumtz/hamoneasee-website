<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id(); // Kolom ID, primary key auto-increment

            // Foreign key ke tabel articles.
            // onDelete('cascade') berarti jika artikel dihapus,
            // komentar-komentar terkait juga ikut terhapus.
            $table->foreignId('artikel_id')->constrained('artikel')->onDelete('cascade');

            // Foreign key ke tabel users (penulis komentar).
            // onDelete('cascade') berarti jika user dihapus,
            // komentar yang mereka buat juga ikut terhapus.
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            $table->text('content'); // Kolom untuk isi komentar

            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
