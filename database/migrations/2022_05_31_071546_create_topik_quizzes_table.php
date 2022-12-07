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
        Schema::create('t_topik_quiz', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('topik_id');
            $table->unsignedBigInteger('quiz_id');
            $table->timestamps();

            $table->foreign('topik_id')->references('id')->on('t_topik');
            $table->foreign('quiz_id')->references('id')->on('t_quiz');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('topik_quizzes');
    }
};
