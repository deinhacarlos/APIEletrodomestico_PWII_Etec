<?php

namespace App\Http\Controllers;

use App\Models\Estoque;
use Illuminate\Http\Request;

class EstoqueController extends Controller
{
    // Listar todos os registros
    public function index()
    {
        return response()->json(Estoque::all());
    }

    // Cadastrar novo produto
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomeprod' => 'required|string|max:255',
            'marcaprod' => 'required|string|max:255',
            'descprod' => 'nullable|string',
            'qtdprod' => 'required|integer|min:0',
            'dtentradaprod' => 'required|date',
            'dtsaidaprod' => 'nullable|date',
        ]);

        $estoque = Estoque::create($validated);

        return response()->json([
            'message' => 'Produto cadastrado com sucesso!',
            'data' => $estoque
        ], 201);
    }

    // Exibir um produto específico
    public function show(Estoque $estoque)
    {
        return response()->json($estoque);
    }

    // Atualizar um produto
    public function update(Request $request, Estoque $estoque)
    {
        $validated = $request->validate([
            'nomeprod' => 'required|string|max:255',
            'marcaprod' => 'required|string|max:255',
            'descprod' => 'nullable|string',
            'qtdprod' => 'required|integer|min:0',
            'dtentradaprod' => 'required|date',
            'dtsaidaprod' => 'nullable|date',
        ]);

        $estoque->update($validated);

        return response()->json([
            'message' => 'Produto atualizado com sucesso!',
            'data' => $estoque
        ], 200);
    }

    // Excluir um produto
    public function destroy(Estoque $estoque)
    {
        $estoque->delete();

        return response()->json([
            'message' => 'Produto excluído com sucesso!'
        ], 204);
    }

    // Buscar por nome ou marca
    public function buscar(Request $request)
    {
        $query = Estoque::query();

        if ($request->filled('nomeprod')) {
            $query->where('nomeprod', 'like', '%' . $request->nomeprod . '%');
        }

        if ($request->filled('marcaprod')) {
            $query->where('marcaprod', 'like', '%' . $request->marcaprod . '%');
        }

        return response()->json($query->get());
    }
}
