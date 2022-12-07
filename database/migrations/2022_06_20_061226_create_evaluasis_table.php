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
        Schema::create('t_evaluasi', function (Blueprint $table) {
            $table->id();
            $table->string('program');
            $table->string('jenis_kegiatan');
            $table->string('nama_kegiatan');
            $table->date('periode_awal');
            $table->date('periode_akhir');
            $table->string('pola');
            $table->string('moda');
            $table->string('pb');
            $table->string('kelas_group');
            $table->string('penanggung_jawab_kegiatan');
            $table->integer('peserta_dipanggil');
            $table->integer('peserta_hadir');
            $table->integer('peserta_tuntas');
            $table->integer('peserta_tidak_tuntas');
            $table->date('tanggal_evaluasi');
            $table->string('laporan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluasis');
    }
};
