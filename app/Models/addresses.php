<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addresses extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'city_id', 'line1', 'line2','google_url','user_username'];
    public $incrementing = false;
    protected $primaryKey = 'id';

}
