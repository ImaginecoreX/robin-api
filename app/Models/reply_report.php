<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reply_report extends Model
{
    use HasFactory;
    
    protected $fillable =['id','reply_id','user_username'];

    public $incrementing = false;

    protected $primarykey = 'id';
}
