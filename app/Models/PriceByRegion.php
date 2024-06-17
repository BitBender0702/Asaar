<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceByRegion extends Model
{
    use HasFactory;
    protected $table="price_by_regions";
    protected $guarded=array();

}
