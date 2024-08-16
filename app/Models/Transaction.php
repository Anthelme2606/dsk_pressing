<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;
class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "amount",
        "type",
        "deposit_id",
        "transaction_date"
    ];

    public function deposit(){
        return Deposit::find($this->deposit_id);
    }
}
