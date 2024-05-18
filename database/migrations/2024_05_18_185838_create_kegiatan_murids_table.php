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
        Schema::create('kegiatan_murids', function (Blueprint $table) {
            $table->foreignUuid('murid_id')->constrained();
            $table->foreignUuid('kegiatan_id')->constrained();
            $table->primary(['murid_id', 'kegiatan_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatan_siswas');
    }
};
