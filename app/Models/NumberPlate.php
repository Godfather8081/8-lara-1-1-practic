<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NumberPlate extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'type',
        'car_id'
    ];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
