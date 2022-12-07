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
        Schema::create('t_kursus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jenis_kursus_id');
            $table->unsignedBigInteger('kategori_kursus_id');
            $table->integer('author_id');
            $table->string('judul');
            $table->string('deskripsi');
            $table->string('gambar');
            $table->timestamps();

            $table->foreign('jenis_kursus_id')->references('id')->on('m_jenis_kursus');
            $table->foreign('kategori_kursus_id')->references('id')->on('m_kategori_kursus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kursuses');
    }
};
