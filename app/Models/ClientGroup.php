<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'group_id'
    ];

    public function client(){
        return Client::findOrFail($this->client_id);
    }

    public function group(){
        return LoyalGroup::findOrFail($this->group_id);
    }
}
