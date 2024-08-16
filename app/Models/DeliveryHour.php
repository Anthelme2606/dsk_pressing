<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryHour extends Model
{
    use HasFactory;
    protected $fillable = [
        'lavage_hour',
        'express_hour',
        'repassage_hour'
    ];


}
