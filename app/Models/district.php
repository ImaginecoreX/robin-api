<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class district extends Model
{
    use HasFactory;
    protected $fillable = [ 'id','district','province_id'];
    public $incrementing = false;
    protected $primaryKey = 'id';
}
