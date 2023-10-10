<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment_report extends Model
{
    use HasFactory;

    protected $fillable =['id','comment_id','user_username'];

    public $incrementing = false;

    protected $primarykey = 'id';
}
