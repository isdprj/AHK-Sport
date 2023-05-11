<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariation extends Model
{
    protected $table = 'product_variations';
    use HasFactory;

    public function productVariation(){
        return $this->belongsTo(Product::class,'id_product', 'id');
    }
}
