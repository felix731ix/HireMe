<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionHeaders extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function transactionDetails(){
        return $this->hasMany(TransactionDetails::class, 'transaction_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
