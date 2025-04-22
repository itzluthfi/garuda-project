<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Flight extends Model
{
    /** @use HasFactory<\Database\Factories\FlightFactory> */
    use HasFactory, SoftDeletes;
    protected $fillable =[
        'airline_id',
        'flight_number',
    ]; 

    public function airline(){
        return $this->belongsTo(Airline::class);
    }

    public function flightSegments(){
        return $this->hasMany(FlightSegment::class);
    }

    public function flightSeats(){
        return $this->hasMany(FlightSeat::class);
    }

    public function flightClasses(){
        return $this->hasMany(FlightClass::class);
    }

    public function transactions(){
        return $this->hasMany(Transaction::class);
    }
}