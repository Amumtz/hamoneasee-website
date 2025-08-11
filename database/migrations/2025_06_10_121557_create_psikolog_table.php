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
        Schema::create('psikolog', function (Blueprint $table) {
                $table->id(); // Kolom id, auto-incrementing primary key
                $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Kolom user_id sebagai foreign key ke tabel users
                $table->string('nama_lengkap', 100); // Kolom nama_lengkap dengan panjang 100 karakter
                $table->string('nomor_lisensi', 50)->unique(); // Kolom nomor_lisensi dengan panjang 50 karakter dan harus unik
                $table->enum('gender', ['male', 'female']); // Kolom gender dengan pilihan 'male' atau 'female'
                $table->enum('usia_range', ['25-30', '30-35', '>35']); // Kolom usia_range dengan pilihan rentang usia
                $table->enum('spesialis', ['klinis', 'konseling', 'anak-remaja']); // Kolom spesialis dengan pilihan spesialisasi
                $table->text('kualifikasi')->nullable(); // Kolom kualifikasi, bisa kosong (nullable)
                $table->integer('pengalaman_tahun')->nullable(); // Kolom pengalaman_tahun, bisa kosong (nullable)
                $table->integer('jumlah_konsultasi')->default(0); // Kolom jumlah_konsultasi dengan nilai default 0
                $table->integer('biaya_konsultasi'); // Kolom biaya_konsultasi
                $table->text('deskripsi')->nullable(); // Kolom deskripsi, bisa kosong (nullable)
                $table->decimal('penilaian', 2, 1)->default(0.0); // Kolom penilaian dengan 2 digit total dan 1 digit di belakang koma, default 0.0
                $table->string('foto', 255)->nullable(); // Kolom foto (path file), bisa kosong (nullable)
                $table->timestamps(); // Kolom created_at dan updated_at
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('psikolog');
    }
};
