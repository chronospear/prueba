<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'id';

    protected $fillable = ['id','name','quantity','price', 'invoice_id'];



    public function Total() {

        return $this->price * $this->quantity;
    }

}
