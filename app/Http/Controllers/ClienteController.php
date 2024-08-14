<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{

    public function index()
    {
        $clientes = Cliente::all();
        return response()->json($clientes);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
           'nome' => 'required|string|max:255',
           'email' => 'required|string|email|max:255|unique:clientes',
           'telefone' => 'required|string|max:20',
           'cnh' => 'required|string|max:20|unique:clientes',
        ]);

        $cliente = Cliente::create($validatedData);
        return response()->json($cliente, 201);
    }

    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);
        return response()->json($cliente);
    }

    public function update(Request $request, $id)
    {
        $cliente = Cliente::findOrFail($id);

        $validatedData = $request->validate([
            'nome' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:clientes,email,' . $cliente->id,
            'telefone' => 'sometimes|required|string|max:20',
            'cnh' => 'sometimes|required|string|max:20|unique:clientes,cnh,' . $cliente->id, 
        ]);

        $cliente->update($validatedData);
        return response()->json($cliente);
    }

    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();

        return response()->json(null, 204);
    }
}
