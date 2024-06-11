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
        Schema::create('siswas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('wali_murid_id')->references('id')->on('users');
            $table->foreignUuid('kelas_id')->constrained();
            $table->string('name');
            $table->string('nisn');
            $table->string('nis');
            $table->enum('jenis_kelamin', ['P', 'L']);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('avatar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
