<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\Return_;

class Veiculo extends Model
{
    use HasFactory;

    protected $fillable = ['marca', 'modelo', 'ano', 'placa', 'status', 'valor_diaria'];

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }
}
