<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payslip extends Model
{
    use HasFactory;
    protected $primaryKey= 'id';
    protected $fillable= ['id', 'Employee_name', 'Employee_code', 'Account_number', 'Working_branch', 'Department', 'Date_of_joining', 'Designation', 'Pay_period', 'Basic_salary', 'Incentive_pay', 'House_rent_amount', 'Meal_allowance', 'Provident_fund', 'Loan_amount', 'Total_earnings', 'Total_deductions', 'Net_pay', 'Professional_tax'];

//relationship
public function user()
{
    // return $this->belongsTo('App\Models\User');
     return $this->belongsTo(User::class, 'user_id');
}
}



