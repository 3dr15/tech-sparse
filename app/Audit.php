<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Audit extends Model
{
    public function userPaidTo(){
        return $this->belongsTo(User::class);
    }

    public function userPaidBy(){
        return $this->belongsTo(User::class);
    }

    public function payAcceptMethod(){
        return $this->belongsTo(PayMethod::class);
    }
}
