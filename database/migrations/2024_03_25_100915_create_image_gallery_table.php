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

         Schema::create('image_galleries', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger("apartment_id");
            $table->foreign("apartment_id")->references("id")->on("apartments");
            $table->string("image_gallery", 255);
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
        Schema::dropIfExists('image_gallery');
    }
};
