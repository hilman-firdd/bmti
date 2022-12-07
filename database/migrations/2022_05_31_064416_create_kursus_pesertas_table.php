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
        Schema::create('t_kursus_peserta', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kursus_id');
            $table->unsignedBigInteger('peserta_id');
            $table->integer('sertifikat_id');
            $table->float('nilai');
            $table->enum('pass', ['incomplete']);
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->timestamps();

            $table->foreign('kursus_id')->references('id')->on('t_kursus');
            $table->foreign('peserta_id')->references('id')->on('m_peserta');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kursus_pesertas');
    }
};
