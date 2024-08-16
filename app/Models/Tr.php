<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tr extends Model
{
    use HasFactory;

    protected $fillable = [
        "amount",
        "type",
        "deposit_id",
        "transaction_date"
    ];
}
