<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    public function cart(){
        return $this->belongsTo(Cart::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function transactionDetails(){
        return $this->belongsTo(TransactionDetails::class);
    }

}
