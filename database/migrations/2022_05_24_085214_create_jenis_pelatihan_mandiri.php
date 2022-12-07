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
        SCHEMA::CREATE('t_jenis_pelatihan_mandiri', FUNCTION (Blueprint $TABLE) {
            $TABLE->id();
            $TABLE->INTEGER('id_pelatihan');
            $TABLE->INTEGER('id_content');
            $TABLE->STRING('judul');
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
        Schema::dropIfExists('jenis_pelatihan_mandiri');
    }
};
