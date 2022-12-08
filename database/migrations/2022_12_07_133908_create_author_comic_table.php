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
        Schema::create('author_comic', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('author_id');
            $table->unsignedBigInteger('comic_id');

            $table->foreign('author_id')->references('id')->on('authors')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('comic_id')->references('id')->on('comics')->onUpdate('cascade')->onDelete('restrict');
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
        // Schema::table('author_comic', function (Blueprint $table) {
        //     Schema::dropForeign('author_id');
        //     $table->dropForeign('comic_id');
        Schema::dropIfExists('author_comic');
        //    });
    }
};
