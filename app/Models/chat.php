<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chat extends Model
{
    use HasFactory;
    protected $fillable = [ 'id','user_from', 'user_to', 'msg','date','msg_status_id'];
    public $incrementing = false;
    protected $primaryKey = 'id';
}
