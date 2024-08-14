<?php

namespace App\Http\Controllers;

use App\Models\Pagamento;
use Illuminate\Http\Request;

class PagamentoController extends Controller
{
    public function index()
    {
        $pagamentos = Pagamento::all();
        return response()->json($pagamentos);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'reserva_id' => 'required|exists:reservas,id',
            'valor' => 'required|numeric|min:0',
            'metodo_pagamento' => 'required|in:cartao_credito,boleto,PIX',
            'status' => 'required|in:pendente,pago,cancelado',
        ]);

        $pagamento = Pagamento::create($validatedData);
        return response()->json($pagamento, 201);
    }

    public function show($id)
    {
        $pagamento = Pagamento::findOrFail($id);
        return response()->json($pagamento);
    }

    public function update(Request $request, $id)
    {
        $pagamento = Pagamento::findOrFail($id);

        $validatedData = $request->validate([
            'reserva_id' => 'sometimes|required|exists:reservas,id',
            'valor' => 'sometimes|required|numeric|min:0',
            'metodo_pagamento' => 'sometimes|required|in:cartao_credito,boleto,PIX',
            'status' => 'sometimes|required|in:pendente,pago,cancelado',
        ]);

        $pagamento->update($validatedData);
        return response()->json($pagamento);
    }

    public function destroy($id)
    {
        $pagamento = Pagamento::findOrFail($id);
        $pagamento->delete();

        return response()->json(null, 204);
    }
}