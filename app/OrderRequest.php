<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderRequest extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function quotation(){
        return $this->hasMany(Quotation::class)->orderByDesc('created_at');
    }
}
