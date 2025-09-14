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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();

            // Relasi ke User
            // Task ini milik user_id.
            // constrained() -> Memastikan user_id ada di tabel 'users'.
            // onDelete('cascade') -> Jika User dihapus, semua task miliknya ikut terhapus.
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
            $table->string('title');
            $table->text('description')->nullable();
            $table->enum('status', ['pending', 'completed'])->default('pending');
            
            $table->timestamps(); // (created_at dan updated_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
