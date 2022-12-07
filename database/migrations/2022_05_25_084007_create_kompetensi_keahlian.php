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
        SCHEMA::CREATE('m_kompetensi_keahlian', FUNCTION (Blueprint $TABLE) {
            $TABLE->id();
            $TABLE->STRING('nama_kompetensi');
            $TABLE->STRING('deskripsi');
            $TABLE->STRING('gambar_banner');
            $TABLE->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kompetensi_keahlian');
    }
};
