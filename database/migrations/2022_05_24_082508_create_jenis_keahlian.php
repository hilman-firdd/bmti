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
        Schema::create('t_jenis_keahlian', function (Blueprint $table) {
            $table->id();
            $table->integer('id_kompetensi');
            $table->string('judul');
            $table->string('gambar_banner');
            $table->string('file_content');
            $table->string('video_content');
            $table->string('author');
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
        Schema::dropIfExists('jenis_keahlian');
    }
};
