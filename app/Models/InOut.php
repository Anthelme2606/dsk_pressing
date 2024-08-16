<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InOut extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "libelle",
        "type",
        "montant",
        "action_date",
        "agency_id",
        "status"
    ];
}
