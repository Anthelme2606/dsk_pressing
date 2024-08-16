<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Carbon;
use Spatie\Permission\Traits\HasRoles as HasRoles;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes;

    protected $fillable = [
        'fullname',
        'picture',
        'email',
        'phone_number',
        'address',
        'password',
        'agency_id',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function agency() {
        return Agency::findOrFail($this->agency_id);
    }

    public function receiptToDay(){
        $todayStart = Carbon::now()->startOfDay();
        $todayEnd = Carbon::now()->endOfDay();

        $transactions = Transaction::whereBetween('transaction_date', [$todayStart, $todayEnd])
                                       ->get();
        $amount = 0;
        $nbr_articles = 0;

        foreach($transactions as $trans){
            if($trans->deposit()->user_id == $this->id){
                $amount+=$trans->amount;
            }

            if($trans->deposit()->deposit_date == now()){
                $nbr_articles+=$trans->deposit()->nbr_articles();
            }
        }

        $deposits = Deposit::whereBetween('created_at', [$todayStart, $todayEnd])
                    ->where('agency_id', Auth::user()->agency_id)
                    ->get();
        $total = 0;
        foreach($deposits as $deposit){
            if($deposit->agency_id == $this->agency_id && $deposit->user_id == $this->id){
                $total+=$deposit->total;
            }
        }
        return $total;
    }

    public function articlesToDay(){
        $todayStart = Carbon::now()->startOfDay();
        $todayEnd = Carbon::now()->endOfDay();

        $deposits = Deposit::whereBetween('created_at', [$todayStart, $todayEnd])
                    ->where('agency_id', Auth::user()->agency_id)
                    ->get();
        $countArticles = 0;
        foreach($deposits as $deposit){
            if($deposit->agency_id == $this->agency_id && $deposit->user_id == $this->id){
                $countArticles+=$deposit->nbr_articles();
            }
        }

        return $countArticles;
    }

}
