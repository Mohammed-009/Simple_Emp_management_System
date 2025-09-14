<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $primaryKey= 'id';
    protected $fillable= ['id', 'firstname', 'lastname', 'phonenumber', 'emergencycontact', 'email', 'department', 'employee_number', 'positiontitle', 'Level', 'employeetype', 'birthdate', 'citizenship', 'salary', 'startdate', 'gender'];
}
