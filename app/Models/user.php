<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    use HasFactory;

    
    protected $fillable = ['username', 'fname', 'lname', 'email','password','bio','profile_url','points', 'gender_id','status_id'];
    public $incrementing = false;
    protected $primaryKey = 'username';
}
