<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_fav_category extends Model
{
    use HasFactory;
    protected $fillable = [ 'id','user_username','category_id'];
    public $incrementing = false;
    protected $primaryKey = 'id';

}
