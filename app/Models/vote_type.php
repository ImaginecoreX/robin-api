<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vote_type extends Model
{
    use HasFactory;
    protected $fillable = [ 'id','vote_type_name'];
    public $incrementing = false;
    protected $primaryKey = 'id';
}
