<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = "customers";
    use HasFactory;
    public function bill(){
        return $this -> hasMany(Bill::class, 'id_customer', 'id');
    }
}
