<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialAccount extends Model
{
    protected $table = 'social_accounts';
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class,'id','id_user');
    }
}
