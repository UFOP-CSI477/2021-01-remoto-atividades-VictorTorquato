<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price'
    ];

    // 1 tipo tem muitos protocolos
    public function requests() {
        return $this->hasMany(Requests::class);
    }
}
