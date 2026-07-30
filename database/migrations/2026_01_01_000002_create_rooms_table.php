<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('room_number', 10)->unique();
            $table->enum('type', ['standar', 'deluxe', 'suite']);
            $table->decimal('price', 12, 2);
            $table->enum('status', ['tersedia', 'dipesan', 'ditempati', 'perbaikan'])->default('tersedia');
            $table->text('facilities')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('rooms'); }
};
