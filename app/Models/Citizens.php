<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Citizens extends Model
{
    //
    use HasApiTokens;
    protected $fillable =[
        'name',
        'email',
        'address',
        'phone_number',
        'password',
    ];

    public function wallts(){
        return $this->hasMany(Wallets::class);
    }
}
