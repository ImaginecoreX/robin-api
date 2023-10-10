<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vote extends Model
{
    use HasFactory;
    protected $fillable = [ 'id','user_username','post_id','vote_type_id'];
    public $incrementing = false;
    protected $primaryKey = 'id';
}
