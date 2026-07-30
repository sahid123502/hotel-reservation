<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('room_id')->constrained()->cascadeOnDelete();
            $table->date('check_in_date');
            $table->date('check_out_date');
            $table->decimal('total_price', 12, 2);
            $table->enum('status', ['menunggu', 'disetujui', 'ditolak', 'dibatalkan', 'selesai'])->default('menunggu');
            $table->string('payment_proof')->nullable();
            $table->text('rejection_note')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('reservations'); }
};
