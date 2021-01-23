<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation_service', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('reservation_id')->unsigned()->nullable();
            $table->foreign('reservation_id')->references('id')
                  ->on('reservations')->onUpdate('cascade')->onDelete('set null');    
            
            $table->bigInteger('service_id')->unsigned()->nullable();
            $table->foreign('service_id')->references('id')
                  ->on('services')->onUpdate('cascade')->onDelete('set null');  

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
        Schema::dropIfExists('reservation_service');
    }
}
