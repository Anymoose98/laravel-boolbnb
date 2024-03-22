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
           $table->boolean('visibility');
           $table->decimal('longitudine');
           $table->decimal('latitudine');
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