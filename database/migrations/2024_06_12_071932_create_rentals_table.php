<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rental_owner'); // Updated type
            $table->string('rental_item_name');
            $table->string('rental_status');
            $table->text('rental_description');
            $table->string('tags')->nullable();
            $table->string('rent_price');
            $table->string('rent_image_one')->nullable();
            $table->string('rent_image_two')->nullable();
            $table->string('rent_image_three')->nullable();
            $table->timestamps();

            // Adding the foreign key constraint
            $table->foreign('rental_owner')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rentals');
    }
}
