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
        Schema::create('article_images', function (Blueprint $table) {
            $table->id(); // Kolom ID, primary key auto-increment
            // Foreign key ke tabel articles. onDelete('cascade') berarti
            // jika artikel dihapus, gambar-gambar terkait juga ikut terhapus.
            $table->foreignId('artikel_id')->constrained('artikel')->onDelete('cascade');
            $table->string('path'); // Kolom untuk menyimpan path/URL gambar
            $table->string('caption')->nullable(); // Kolom opsional untuk keterangan gambar
            $table->integer('order')->default(0); // Kolom opsional untuk urutan gambar dalam artikel
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_images');
    }
};
