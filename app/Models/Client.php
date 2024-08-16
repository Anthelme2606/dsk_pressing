<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Sponsorship;
use App\Models\Account;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
class Client extends Authenticatable
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'picture',
        'fullname',
        'email',
        'phone_number',
        'fixe_number',
        'birthday',
        'waiting_for',
        'city',
        'address',
        'sponsorship_code',
        'account_id',
        'status'
    ];

    protected $hidden = [
        'password'
    ];

    public function sponsorship()
    {
        // return $this->belongsTo(Sponsorship::class, 'sponsorship_code');
        return Sponsorship::find($this->sponsorship_code);
    }

    public function account()
    {
        return Account::find($this->account_id);
    }
}
