<?php

namespace App\Http\Controllers;

use App\Models\Veiculo;
use Illuminate\Http\Request;

class VeiculoController extends Controller
{

    public function index()
    {
        $veiculos = Veiculo::all();
        return response()->json($veiculos);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'marca' => 'required|string|max:100',
            'modelo' => 'required|string|max:100',
            'ano' => 'required|integer|digits:4',
            'placa' => 'required|string|max:20|unique:veiculos',
            'status' => 'required|in:disponível,alugado,manutenção',
            'valor_diaria' => 'required|numeric|min:0',
        ]);

        $veiculo = Veiculo::create($validatedData);
        return response()->json($veiculo, 201);
    }

    public function show($id)
    {
       $veiculo = Veiculo::findOrFail($id);
       return response()->json($veiculo);
    }

    public function update(Request $request, $id)
    {
        $veiculo = Veiculo::findOrFail($id);

        $validatedData = $request->validate([
            'marca' => 'sometimes|required|string|max:100',
            'modelo' => 'sometimes|required|string|max:100',
            'ano' => 'sometimes|required|integer|digits:4',
            'placa' => 'sometimes|required|string|max:20|unique:veiculos,placa,' . $veiculo->id,
            'status' => 'sometimes|required|in:disponível,alugado,manutenção',
            'valor_diaria' => 'sometimes|required|numeric|min:0',
        ]);

        $veiculo->update($validatedData);
        return response()->json($veiculo);
    }

    public function destroy($id)
    {
        $veiculo = Veiculo::findOrFail($id);
        $veiculo->delete();

        return response()->json(null, 204);
    }
}
