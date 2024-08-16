<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\User;
use App\Models\Client;

class Deposit extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code',
        'deposit_date',
        'retrieve_date',
        'discount',
        'advanced',
        'total',
        'client_id',
        'agency_id', // C'est l'age,nce dans laquelle le dépôt a été faite
        'user_id', // C'est l'id de celui qui fait le dépot
        'deleter', // C'est l'id de celui qui fait une suppression
        'receiver', // C'est l'id de celui qui fait un retrait
        'status',
        'type_reglement',
        "instant_retrieve",
        "left_to_pay",
        'etat',
        'laveur_id',
        'classeur_id'
    ];

    protected $dates = [
        'deposit_date',
        'retrieve_date',
        'created_at',
        'updated_at',
    ];

    public function casheer(){
        if($this->receiver == null){
            return "";
        }
        return User::withTrashed()->find($this->receiver)->fullname;
    }

    public function client()
    {
        return Client::find($this->client_id);
    }

    public function user()
    {
        return User::withTrashed()->find($this->user_id);
    }

    public function nbr_articles(){
        $account = 0;
        $units = DepositUnit::where("deposit_id", $this->id)->get();
        if($units){
            foreach($units as $unit){
                $account += $unit->quantity;
            }
        }

        return $account;
    }

    public function agence(){
        return substr(Agency::find($this->agency_id)->name, 0, 2);
    }

    public function transaction($my_date){
        $transactions = Transaction::where("deposit_id", $this->id)->where('transaction_date', $my_date)->get();
        $value = 0;
        foreach($transactions as $transaction){
            $value += $transaction->amount;
        }
        return $value;
    }

    public function transaction_list(){
        $transactions = Transaction::where('deposit_id', $this->id)->get();
        return $transactions;
    }

    public function article_qte(){
        $line_deposits = DepositUnit::where('deposit_id', $this->id)->get();
        $count = 0;
        foreach($line_deposits as $line){
            $count += $line->quantity;
        }

        return $count;
    }

    public function total_paid(){
        $transactions = Transaction::where('deposit_id', $this->id)->get();
        $total = 0;
        foreach($transactions as $transaction){
            $total += $transaction->amount;
        }

        return $total;
    }

    public function logPrints()
    {
        return $this->hasMany(LogPrint::class, 'deposit_id');
    }

    public function day_transaction($my_date){
        $transactions = Transaction::where("deposit_id", $this->id)->where('transaction_date', $my_date)->get();
        $value = 0;
        foreach($transactions as $transaction){
            $value += $transaction->amount;
        }
        return $value;
    }
}

