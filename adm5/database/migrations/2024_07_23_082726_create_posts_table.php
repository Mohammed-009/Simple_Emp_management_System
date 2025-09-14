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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->integer('phonenumber');
            $table->integer('emergencycontact');
            $table->string('email');
            $table->string('department');
            $table->string('employeeId');
            $table->string('positiontitle');
            $table->string('employmenttype');
            $table->string('birthdate');
            $table->string('citizenship');
            $table->integer('salary');
            $table->string('startdate');
            $table->string('gender');
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
        Schema::dropIfExists('posts');
    }
};
