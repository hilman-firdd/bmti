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
        Schema::create('m_kelompok_keahlian', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('program_keahlian_id');
            $table->string('nama');
            $table->string('deskripsi');
            $table->timestamps();
            $table->foreign('program_keahlian_id')->references('id')->on('m_program_keahlian');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelompok_keahlians');
    }
};
