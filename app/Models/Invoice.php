<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = ['id','date','type','user_id', 'seller_id'];

    public function user(){

        return $this->belongsTo(User::class,'user_id');
    }

    public function seller(){

        return $this->belongsTo(Seller::class,'seller_id');
    }

    public function product(){

    return $this->hasMany(product::class);
    }

    public function totalproducts() {

    return $this->product->sum(function($total) {
    return $total->quantity * $total->price;
    });
    }
    
}
