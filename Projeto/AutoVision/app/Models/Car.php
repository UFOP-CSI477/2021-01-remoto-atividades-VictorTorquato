<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'modelo',
        'marca',
        'km',
        'user_id',
        'km_update',
        'revisao',
    ];

    protected $casts = [
        'km_update' => 'datetime',
    ];

    // 1 carro tem muitos componentes
    public function components() {
        return $this->hasMany(Component::class);
    }
}
