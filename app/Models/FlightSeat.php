<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FlightSeat extends Model
{
    /** @use HasFactory<\Database\Factories\FlightSeatFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'flight_id',
        'row',
        'column',
        'type_class',
        'is_available',
    ];

    public function flight() {
        return $this->belongsTo(Flight::class);
    }
}