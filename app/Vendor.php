<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function payAcceptMethod(){
        return $this->belongsTo(PayMethod::class);
    }
}
