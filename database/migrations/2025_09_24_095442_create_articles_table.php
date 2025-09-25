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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            
            // Judul & isi artikel
            $table->string('title');                // Judul berita
            $table->text('excerpt')->nullable();    // Ringkasan singkat
            $table->longText('content');            // Konten lengkap

            // Informasi tambahan
            $table->string('slug')->unique();       // Untuk URL SEO
            $table->date('published_at')->nullable(); // Tanggal publikasi

            // Relasi/kategori & penulis
            $table->unsignedBigInteger('category_id')->nullable(); // kategori: Layanan, Kegiatan, Pendidikan, dll
            $table->foreign('category_id')->references('id')->on('category_articles')->nullOnDelete();

            $table->unsignedBigInteger('author_id')->nullable();   // opsional: user penulis
            $table->foreign('author_id')->references('id')->on('users')->nullOnDelete();

            // Media
            $table->string('thumbnail')->nullable(); // path gambar thumbnail

            // Status
            $table->enum('status', ['draft','published'])->default('draft');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
