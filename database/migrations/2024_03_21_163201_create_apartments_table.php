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
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
           $table->string('description');
           $table->smallInteger('rooms');
           $table->smallInteger('beds');
           $table->smallInteger('bathrooms');
           $table->smallInteger('square_meters');
           $table->string('location');
           $table->string('image');
           $table->string('image_gallery');
           $table->string('visibility', 2)->default('Si');
           $table->decimal('longitudine')->nullable();
           $table->decimal('latitudine')->nullable();
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
        Schema::dropIfExists('apartments');
    }
};
