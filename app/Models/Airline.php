<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Airline extends Model
{
    /** @use HasFactory<\Database\Factories\AirlineFactory> */
    use HasFactory,SoftDeletes;

    protected $fillable = ['code', 'name', 'logo','country'];

    public function flights()
    {
        return $this->hasMany(Flight::class);
    }
}