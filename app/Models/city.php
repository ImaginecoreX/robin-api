<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    use HasFactory;
    protected $fillable = [ 'id','city','district_id'];
    public $incrementing = false;
    protected $primaryKey = 'id';
}
