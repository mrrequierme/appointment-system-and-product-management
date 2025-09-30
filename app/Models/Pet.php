<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Appointment;
class Pet extends Model
{
    protected $fillable = ['name', 'birthday', 'gender', 'color', 'breed', 'pet_type', 'user_id'];
    
    protected $casts = [
        'birthday' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function appointments()
    {
    return $this->hasMany(Appointment::class);
    }
}
