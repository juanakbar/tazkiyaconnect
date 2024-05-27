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
        Schema::create('wali_murids', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->constrained();
            $table->string('slug');
            $table->string('nik', 20);
            $table->string('agama')->nullable();
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('pendidikan');
            $table->string('pekerjaan');
            $table->string('pendapatan')->nullable();
            $table->string('kewarganeraan');
            $table->char('province_code', 2)->nullable();
            $table->char('city_code', 4)->nullable();
            $table->char('district_code', 7)->nullable();
            $table->char('village_code', 10)->nullable();
            $table->text('alamat');
            $table->string('avatar')->nullable();
            $table->timestamps();

            $table->foreign('province_code')->references('code')->on('provinces')->onDelete('set null');
            $table->foreign('city_code')->references('code')->on('cities')->onDelete('set null');
            $table->foreign('district_code')->references('code')->on('districts')->onDelete('set null');
            $table->foreign('village_code')->references('code')->on('villages')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wali_murids');
    }
};
