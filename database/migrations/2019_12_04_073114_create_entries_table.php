<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('category_id')->nullable(false);
            $table->integer('image_id')->nullable(false);
            $table->integer('thumbnail_id')->nullable(false);
            $table->string('title',128)->nullable(false);
            $table->string('slug',64)->unique()->nullable(false);
            $table->text('short_desc')->nullable(false);
            $table->longText('desc')->nullable(false);
            $table->integer('user_id')->nullable(false);
            $table->timestamps();

            // Setting the category_id as an index to speed up queries when searching by category.
            $table->index('category_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entries');
    }
}
