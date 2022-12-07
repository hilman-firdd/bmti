<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_kecamatan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kota_kab_id');
            $table->string('kode');
            $table->string('nama');
            $table->timestamps();

            $table->foreign('kota_kab_id')->references('id')->on('m_kota_kab');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kecamatan');
    }
};
