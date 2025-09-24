<?php

// database/migrations/2025_09_20_000002_create_services_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_category_id')
                  ->constrained()
                  ->cascadeOnDelete();    // hapus otomatis jika kategori dihapus
            $table->string('name');       // contoh: Poli Anak, Poli Gizi
            $table->text('description')->nullable();
            $table->text('details')->nullable();  // poin-poin layanan, bisa simpan format JSON/Markdown
            $table->string('room')->nullable();   // ruangan atau lokasi
            $table->decimal('base_price', 12, 2)->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};

