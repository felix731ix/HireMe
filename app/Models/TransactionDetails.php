<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetails extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function transactionHeaders(){
        return $this->belongsTo(TransactionHeaders::class);
    }

    public function products(){
        return $this->hasOne(Products::class, 'id', 'product_id');
    }



}
