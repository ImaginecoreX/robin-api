<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reply extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'body', 'comment_id', 'user_username', 'status_id'];

    public $incrementing = false;

    protected $primarykey = 'id';
}
