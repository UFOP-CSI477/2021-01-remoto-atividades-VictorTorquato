<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'nome',
        'label',
        'km_rev',
        'km_prox_rev', 
        'data_rev',
        'data_prox_rev',
        'carName',
        'priority',
        'atraso'
    ];

    // 1 componente pertence a um carro
    public function car() {
        return $this->belongsTo(Car::class);
    }
}
