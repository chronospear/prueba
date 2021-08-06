<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;


    protected $fillable = ['name','description','estimated_date', 'max_date', 'author_id','user_id'];

    public function user(){

        return $this->BelongsTo(User::class,'user_id');
    }

    public function author(){

        return $this->BelongsTo(User::class,'author_id');
    }
}
