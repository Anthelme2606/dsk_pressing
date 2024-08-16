<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use WisdomDiala\Countrypkg\Models\Country;
use App\Models\Pressing;
use App\Models\CodeSuffix;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agency extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'address',
        'contact',
        'country_id',
        'pressing_id',
        'status'
    ];

    public function users(){
        return User::where('agency_id', $this->id)->get();
    }

    public function country()
    {
        return Country::find($this->country_id);
    }

    public function pressing()
    {
        return Pressing::find($this->pressing_id);
    }

    public function suffix(){
        return CodeSuffix::where('agency_id', $this->id)->get()[0]->title;
    }
}
