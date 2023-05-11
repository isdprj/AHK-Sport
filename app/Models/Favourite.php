<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{

    protected $fillable = ['id_product','id_user'];
    use HasFactory;

    public function user(){
        $this->belongsTo(User::class,'id_user','id');

    }

    public function product(){
        $this->belongsTo(Product::class, 'id_product', 'id');
    }
}
