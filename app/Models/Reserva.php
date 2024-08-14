<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = ['cliente_id', 'veiculo_id', 'data_reserva', 'data_inicio', 'data_fim', 'valor_total', 'status'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function veiculo()
    {
        return $this->hasMany(Veiculo::class);
    }

    public function pagamentos()
    {
        return $this->belongsTo(Pagamento::class);
    }
}
