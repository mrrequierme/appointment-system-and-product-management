<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Product extends Model
{
    protected $fillable = [
        'name',
        'definition',
        'price',
        'file',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
