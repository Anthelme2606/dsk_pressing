<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogPrint extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'deposit_id'
    ];

    public function deposit()
    {
        return $this->belongsTo(Deposit::class, 'deposit_id');
    }

    public function user(){
        return User::find($this->user_id);
    }

    
}
