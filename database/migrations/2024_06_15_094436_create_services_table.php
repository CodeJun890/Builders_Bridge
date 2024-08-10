<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_owner'); // Updated type
            $table->string('service_title');
            $table->string('service_status');
            $table->string('category');
            $table->text('service_description');
            $table->text('service_price');
            $table->string('service_image_one')->nullable();
            $table->string('service_image_two')->nullable();
            $table->string('service_image_three')->nullable();
            $table->timestamps();
            // Adding the foreign key constraint
            $table->foreign('service_owner')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
