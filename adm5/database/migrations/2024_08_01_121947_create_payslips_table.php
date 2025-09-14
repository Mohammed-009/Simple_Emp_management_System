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
        Schema::create('payslips', function (Blueprint $table) {
            $table->id();
            $table->string('Employee_name');
            $table->string('Department');
            $table->string('Date_of_joining');
            $table->string('Designation');
            $table->string('Pay_period');
            $table->integer('Basic_salary');
            $table->integer('Incentive_pay');
            $table->integer('House_rent_amount');
            $table->integer('Meal_allowance');
            $table->integer('Provident_fund');
            $table->integer('Professional_tax');
            $table->integer('Loan_amount');
            $table->integer('Total_earnings');
            $table->integer('Total_deductions');
            $table->integer('Net_pay');
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
        Schema::dropIfExists('payslips');
    }
};
