<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = "bills"; 
    use HasFactory;
    public function billDetail(){
        return $this -> hasMany(BillDetail::class, 'id_bill', 'id');
    }
    public function customer(){
        return $this -> belongsTo(Customer::class, 'id_customer', 'id');
    }
}
