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
            $table->unsignedBigInteger('niveau_id');
            $table->foreign('niveau_id')->references('id')->on('niveau');
            $table->dateTime('date');
            $table->string('location');
            $table->string('weather');
            $table->text('notes')->nullable();
            $table->string('photo_url')->nullable();
            $table->string('video_url')->nullable();
            $table->integer('user_id');
            $table->integer('etape_id');
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
