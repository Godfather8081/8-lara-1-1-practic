<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'model',
        'color',
        'max_speed',
        'manufacture_date'
    ];


    public function numberPlate()
    {
        return $this->hasOne(NumberPlate::class);
    }
}
