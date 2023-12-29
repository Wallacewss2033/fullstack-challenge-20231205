<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    private Expense $expense;

    public function __construct(Expense $expense)
    {
        $this->expense = $expense;
    }

    public function index(): JsonResponse
    {
        $expenses = $this->expense->get()->toArray();

        if (!$expenses) {
            return response()->json(['error' => 'Não há despesas.'], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $expenses,
            'message' => 'Sucesso!'
        ], 200);
    }

    public function store(Request $request): JsonResponse
    {
        TODO: //Não esquecer do request

        $this->expense->create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Despesa criada com sucesso!'
        ], 201);
    }

    public function show(int $id)
    {
        $expense = $this->expense->find($id);

        return response()->json([
            'success' => true,
            'data' => $expense,
            'message' => 'Sucesso!'
        ], 200);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $this->expense->find($id)->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Despesa modificada com sucesso!'
        ], 200);
    }

    public function destroy(int $id): JsonResponse
    {
        $this->expense->find($id)->delete();
        return response()->json(204);
    }
}
