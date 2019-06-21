<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('tmdb_id');
            $table->string('title');
            $table->string('homepage')->nullable();
            $table->string('image_path')->nullable();
            $table->string('backdrop_path')->nullable();
            $table->string('video_link')->nullable();
            $table->integer('screen_time')->nullable();
            $table->date('released_at')->nullable();
            $table->text('overview');
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
        Schema::dropIfExists('movies');
    }
}
