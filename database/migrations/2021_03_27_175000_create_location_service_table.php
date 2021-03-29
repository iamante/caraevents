<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location_service', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('service_id')->unsigned()->nullable();
            $table->foreign('service_id')->references('id')
                  ->on('services')->onDelete('cascade');

            $table->bigInteger('location_id')->unsigned()->nullable();
            $table->foreign('location_id')->references('id')
                  ->on('location')->onDelete('cascade');
                  
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
        Schema::dropIfExists('location_service');
    }
}
