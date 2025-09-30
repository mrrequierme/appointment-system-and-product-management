<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Pet;
use App\Models\Services;
class Appointment extends Model
{
    protected $fillable = ['date', 'time','status','pet_id','user_id','staff_id'];

    protected $casts =[
        'date' => 'date',
        'time' => 'datetime:H:i:s',
    ];
   
   public function user(){
        return $this->belongsTo(User::class);
    }

    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }

    public function staff(){
        return $this->belongsTo(User::class, 'staff_id');
    }

    public function services(){
        return $this->belongsToMany(Services::class,'appointment_services', 'appointment_id', 'service_id');
        
    }
    
}
