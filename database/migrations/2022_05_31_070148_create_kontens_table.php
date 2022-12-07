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
        Schema::create('t_konten', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('topik_id');
            $table->string('judul');
            $table->string('materi');
            $table->integer('status')->default(0);
            $table->timestamps();

            $table->foreign('topik_id')->references('id')->on('t_topik');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kontens');
    }
};
