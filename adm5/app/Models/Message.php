<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $table= 'messages';
    protected $fillable= ['id','user_id', 'Name', 'EmployeeNumber', 'Phone', 'Email', 'MessageBody'];

    //relationship
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
