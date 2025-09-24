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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();

            // Relasi ke dokter
            $table->foreignId('doctor_id')
                  ->constrained('doctors')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();

            // Hari (Senin - Minggu)
            $table->enum('day_of_week', [
                'monday',
                'tuesday',
                'wednesday',
                'thursday',
                'friday',
                'saturday',
                'sunday',
            ]);

            // Slot waktu
            $table->time('start_time');
            $table->time('end_time');

            // Aktif/nonaktif untuk slot ini
            $table->boolean('is_active')->default(true);

            // Catatan tambahan (opsional)
            $table->text('notes')->nullable();

            $table->timestamps();

            // Cegah duplikat slot untuk dokter yang sama
            $table->unique(
                ['doctor_id', 'day_of_week', 'start_time', 'end_time'],
                'doctor_schedule_unique'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
