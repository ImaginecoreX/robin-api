<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    use HasFactory;
    protected $fillable = [ 'email','fname', 'lname', 'password','admin_type_id','admin_status_id'];
    public $incrementing = false;
    protected $primaryKey = 'email';
}
