<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Facility extends Model
{
    /** @use HasFactory<\Database\Factories\FacilityFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'image',
        'name',
        'description',
    ];


    public function flightClasses() { 
        return $this->belongsToMany(FlightClass::class,'flight_class_facilities','facility_id','flight_class_id'); } 
}