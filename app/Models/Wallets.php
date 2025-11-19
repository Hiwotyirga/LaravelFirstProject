<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wallets extends Model
{
    //
    protected $fillable =[
        'txtn_id',
        'amount',
        'balance',
        'type',
        'citizen_id',

    ];
    public function citizen(){
        return $this->belongsTo(Citizens::class);
    }
}
