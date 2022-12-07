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
        Schema::create('t_topik_konten', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('topik_id');
            $table->unsignedBigInteger('konten_id');
            $table->foreign('topik_id')->references('id')->on('t_topik');
            $table->foreign('konten_id')->references('id')->on('t_konten');
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
        Schema::dropIfExists('topik_kontens');
    }
};
