<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('profile')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('firstname');
            $table->string('middlename');
            $table->string('lastname');
            $table->string('gender');
            $table->string('phoneNumber');
            $table->string('birthday');
            $table->string('current_job_title')->nullable();
            $table->string('current_company_name')->nullable();
            $table->text('about')->nullable();
            $table->json('certifications')->nullable();
            $table->json('work_experience')->nullable();
            $table->json('education')->nullable();
            $table->json('social_links')->nullable();
            $table->json('addresses')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
