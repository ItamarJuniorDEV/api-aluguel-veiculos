<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    use HasFactory;

    protected $fillable = ['reserva_id', 'data_pagamento', 'valor', 'metodo_pagamento', 'status'];

    public function reserva()
    {
        return $this->belongsTo(Reserva::class);
    }
}
