<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Appointment;

class Services extends Model
{
    protected $fillable =[
        'services',
        'user_id',
    ];

    public function appointments(){
        return $this->belongsToMany(Appointment::class, 'appointment_services', 'appointment_id', 'service_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
