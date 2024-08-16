<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckedArticle extends Model
{
    use HasFactory;

    protected $fillable = [
        'deposit_id',
        'depositunit_id',
        'client_id',
        'user_id',
        'status'
    ];

    public function user(){
        return User::find($this->user_id);
    }

    public function client(){
        return Client::find($this->client_id);
    }

    public function depositunit(){
        return DepositUnit::find($this->depositunit_id);
    }

    public function deposit(){
        return Deposit::find($this->deposit_id);
    }
}
