<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Article;
use App\Models\Status;
use App\Models\Client;
use App\Models\Deposit;

class DepositUnit extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'article_id',
        'designation',
        'quantity',
        'type_action',
        'state',
        'deposit_id',
        'client_id',
        'retrieve_quantity',
        'user_id',
        'render'
    ];

    public function article()
    {
        return Article::find($this->article_id);
    }

    public function deposit()
    {
        return Deposit::find($this->deposit_id);
    }

    public function client()
    {
        return Client::find($this->client_id);
    }

    public function user()
    {
        return User::find($this->user_id);
    }

    public function render()
    {
        return Render::find($this->render);
    }

    public function states(){
        $states = [];
        foreach(str_split($this->state) as $state){
            array_push($states, Status::find($state)->title);
        }
        return $states;
    }




}
