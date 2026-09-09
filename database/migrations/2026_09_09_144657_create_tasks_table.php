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

            // Data pelanggan
            $table->string('nama_pelanggan');
            $table->string('id_pelanggan');
            $table->string('no_ktp')->nullable();
            $table->string('no_kk')->nullable();
            $table->string('no_hp')->nullable();
            $table->text('alamat')->nullable();

            // Detail tugas
            $table->string('keperluan');
            $table->text('deskripsi')->nullable();

            // Tujuan tugas
            $table->string('divisi');
            $table->enum('prioritas', ['rendah', 'sedang', 'tinggi'])
                  ->default('sedang');

            // Status pengerjaan
            $table->enum('status', ['pending', 'processing', 'completed'])
                  ->default('pending');

            $table->date('deadline')->nullable();

            // CS yang membuat tugas
            $table->foreignId('created_by')
                  ->constrained('users')
                  ->onDelete('cascade');

            $table->timestamps();
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
