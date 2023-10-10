<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;

    protected $fillable =['id','body','post_id','user_username','status_id'];

    public $incrementing = false;

    protected $primarykey = 'id';
}
