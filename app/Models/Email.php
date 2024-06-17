<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $table = 'email';

    protected $fillable = [
        'nom',
        'email',
        'sujet',
        'message',
    ];
    use HasFactory;
}
