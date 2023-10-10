<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post_type extends Model
{
    use HasFactory;
    protected $fillable = [ 'id','type'];
    public $incrementing = false;
    protected $primaryKey = 'id';

}
