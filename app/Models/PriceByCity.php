<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceByCity extends Model
{
    use HasFactory;
    protected $table="price_by_cities";
    protected $guarded=array();

}
