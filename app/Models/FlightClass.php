<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FlightClass extends Model
{
    /** @use HasFactory<\Database\Factories\FlightClassFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'flight_id',
        'class_type',
        'description',
        'price',
        'total_seats',
    ];

    public function flight() {
        return $this->belongsTo(Flight::class);
    }

    public function facilities() {
        return $this->belongsToMany(Facility::class, 'flight_class_facilities', 'flight_class_id', 'facility_id');
    }

    public function transactions() {
        return $this->hasMany(Transaction::class);
    }


  
}