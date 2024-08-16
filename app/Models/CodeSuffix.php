<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodeSuffix extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "agency_id"
    ];

    public function agence(){
        return Agency::find($this->agency_id);
    }
}
