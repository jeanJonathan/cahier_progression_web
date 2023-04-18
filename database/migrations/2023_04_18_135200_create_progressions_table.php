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
        Schema::create('progressions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kite_id');
            $table->foreign('kite_id')->references('id')->on('kites');
            $table->unsignedBigInteger('level_id');
            $table->foreign('level_id')->references('id')->on('levels');
            $table->dateTime('date');
            $table->string('location');
            $table->string('weather');
            $table->text('notes')->nullable();
            $table->string('photo_url')->nullable();
            $table->string('video_url')->nullable();
            $table->integer('user_id');
            $table->unsignedBigInteger('etape_id');
            $table->foreign('etape_id')->references('id')->on('etapes');
            $table->integer('surf_progression')->nullable();
            $table->integer('kite_progression')->nullable();
            $table->integer('wingfoil_progression')->nullable();
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
        Schema::dropIfExists('progressions');
    }
};
