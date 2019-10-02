<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function orderrequest(){
        return $this->belongsTo(OrderRequest::class,'order_request_id');
    }

    public function order(){
        return $this->hasOne(Order::class);
    }
}
