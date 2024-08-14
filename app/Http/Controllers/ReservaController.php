<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function index()
    {
        $reservas = Reserva::all();
        return response()->json($reservas);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'veiculo_id' => 'required|exists:veiculos,id',
            'data_reserva' => 'required|date',
            'data_inicio' => 'required|date|after_or_equal:data_reserva',
            'data_fim' => 'required|date|after_or_equal:data_inicio',
            'valor_total' => 'required|numeric|min:0',
            'status' => 'required|in:ativa,concluída,cancelada',
        ]);

        $reserva = Reserva::create($validatedData);
        return response()->json($reserva, 201);
    }

    public function show($id)
    {
        $reserva = Reserva::findOrFail($id);
        return response()->json($reserva);
    }

    public function update(Request $request, $id)
    {
        $reserva = Reserva::findOrFail($id);

        $validatedData = $request->validate([
            'cliente_id' => 'sometimes|required|exists:clientes,id',
            'veiculo_id' => 'sometimes|required|exists:veiculos,id',
            'data_reserva' => 'sometimes|required|date',
            'data_inicio' => 'sometimes|required|date|after_or_equal:data_reserva',
            'data_fim' => 'sometimes|required|date|after_or_equal:data_inicio',
            'valor_total' => 'sometimes|required|numeric|min:0',
            'status' => 'sometimes|required|in:ativa,concluída,cancelada',
        ]);

        $reserva->update($validatedData);
        return response()->json($reserva);
    }

    public function destroy($id)
    {
        $reserva = Reserva::findOrFail($id);
        $reserva->delete();

        return response()->json(null, 204);
    }
}