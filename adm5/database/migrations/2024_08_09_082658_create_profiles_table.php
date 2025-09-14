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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('Firstname');
            $table->string('Lastname');
            $table->integer('National_ID');
            $table->string('Date_of_birth');
            $table->string('Gender');
            $table->string('Marital_status');
            $table->string('Nationality');
            $table->string('Religion');
            $table->string('Disability');
            $table->string('Telephone');
            $table->string('Email');
            $table->string('Home_address');
            $table->string('County');
            $table->string('Subcounty');
            $table->string('Constituency');
            $table->string('Programme');
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
        Schema::dropIfExists('profiles');
    }
};
