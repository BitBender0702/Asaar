<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceNational extends Model
{
    use HasFactory;
    protected $table="price_nationals";
    protected $guarded=array();

}
