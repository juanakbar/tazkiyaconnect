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
        Schema::create('wali_kelas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('slug')->nullable();
            $table->foreignUuid('user_id')->constrained();
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('nip');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('agama');
            $table->string('alamat');
            $table->string('telepon');
            $table->string('tingkat_pendidikan');
            $table->string('jabatan');
            $table->string('avatar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wali_kelas');
    }
};
