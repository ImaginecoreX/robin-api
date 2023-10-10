<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class saved extends Model
{
    use HasFactory;
    protected $fillable = [ 'id','user_username','post_id'];
    public $incrementing = false;
    protected $primaryKey = 'id';
}
