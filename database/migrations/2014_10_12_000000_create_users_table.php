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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email', 191);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->unsignedBigInteger('sport_id')->nullable();
            $table->foreign('sport_id')->references('id')->on('sports');
            $table->string('address')->nullable();
            $table->string('phone')->nullable();

            $table->unsignedBigInteger('kite_progression')->nullable();
            $table->unsignedBigInteger('surf_progression')->nullable();
            $table->unsignedBigInteger('wingfoil_progression')->nullable();

            $table->foreign('kite_progression')->references('id')->on('progressions');
            $table->foreign('surf_progression')->references('id')->on('progressions');
            $table->foreign('wingfoil_progression')->references('id')->on('progressions');

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};

