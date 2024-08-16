<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromoSpecial extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'percentage',
        'nbr_client',
        'ending_date',
        'ending_time',
    ];
}
