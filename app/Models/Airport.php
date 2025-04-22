<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Airport extends Model
{
    /** @use HasFactory<\Database\Factories\AirportFactory> */
    use HasFactory,SoftDeletes;

    protected $guarded = [];
    protected $fillable = ['iata_code', 'name', 'city', 'country','image'];

    public function FlightSegments() {
        return $this->hasMany(FlightSegment::class);
    }
}