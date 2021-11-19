<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_tag', function (Blueprint $table) {
            $table->id();

            //foreign_key post_id al singolo post
            $table->unsignedBigInteger('post_id');
            // aggiungo il collegamento tra colonna post_id e la relativa colonna 'id' della tabella 'posts'
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');

            //foreign_key tag_id del singolo tag
            $table->unsignedBigInteger('tag_id');
            // aggiungo il collegamento tra colonna tag_id e la relativa colonna 'id' della tabella 'tags'
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('post_tag');
    }
}
