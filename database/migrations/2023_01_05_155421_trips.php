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
        Schema::create('trips', function (Blueprint $table){
            $table->id();
            $table->string('hotel_name');
            $table->float('price');
            $table->string('country');
            $table->string('food');
            $table->string('transport');
            $table->string('description', 10000);
            $table->string('path_photo_1');
            $table->string('path_photo_2');
            $table->string('path_photo_3');
            $table->date('date_start');
            $table->date('date_end');
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
        Schema::dropIfExists('trips');
    }
};
