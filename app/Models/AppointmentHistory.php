<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppointmentHistory extends Model
{
    protected $fillable = [
        'owner_name',
        'owner_email',
        'contact',
        'pet_name',
        'pet_gender',
        'pet_breed',
        'pet_type',
        'pet_birthday',
        'pet_color',
        'date',
        'time',
        'services',
        'status',
        'staff_name',
        'staff_email',
        'user_id',
    ];

     protected $casts = [
        'services'      => 'array',
        'pet_birthday'  => 'date',
        'date'          => 'date',
        'time'         => 'datetime:H:i:s',
    ];
}
