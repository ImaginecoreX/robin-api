<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post_has_categories extends Model
{
    use HasFactory;
    protected $fillable = [ 'id','category_id','post_id'];
    public $incrementing = false;
    protected $primaryKey = 'id';
}
