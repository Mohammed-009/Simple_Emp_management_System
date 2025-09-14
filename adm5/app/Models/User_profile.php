<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User_profile extends Model
{
    use  HasFactory , SoftDeletes;
    protected $date= 'deleted_at';
    // protected $table= 'user_profiles';
    protected $fillable= [ 'user_id', 'Firstname', 'Lastname', 'Employee_number', 'National_ID', 'Date_of_birth', 'Gender', 'Marital_status', 'Nationality', 'Religion', 'Disability', 'Telephone', 'Email', 'Home_address', 'County', 'Subcounty', 'Constituency', 'Programme'];


    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}

