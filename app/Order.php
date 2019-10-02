<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function quotation(){
        return $this->belongsTo(Quotation::class);
    }


}
