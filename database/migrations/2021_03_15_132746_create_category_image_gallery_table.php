<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryImageGalleryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_image_gallery', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('gallery_id')->unsigned()->nullable();
            $table->foreign('gallery_id')->references('id')
                  ->on('galleries')->onDelete('cascade');

            $table->bigInteger('category_image_id')->unsigned()->nullable();
            $table->foreign('category_image_id')->references('id')
                  ->on('category_image')->onDelete('cascade');
                  
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
        Schema::dropIfExists('category_image_gallery');
    }
}
