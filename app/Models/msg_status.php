<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class msg_status extends Model
{
    use HasFactory;
    protected $fillable = [ 'id','status'];
    public $incrementing = false;
    protected $primaryKey = 'id';
}
