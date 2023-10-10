<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    
    protected $fillable = [ 'id','user_username','title','body','acticve','post_type'];
    public $incrementing = false;
    protected $primaryKey = 'id';
}
