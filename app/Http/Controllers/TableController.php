<?php

namespace App\Http\Controllers;

use App\Http\Requests\TableRequest;
use App\Models\Table;


class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $table = Table::all();
        return response()->json($table);
    }

    public function store(TableRequest $request)
    {
        $table = Table::create($request->validated());
        return response()->json($table, 201);
    }

    public function show(Table $table)
    {
        return response()->json($table);
    }

    public function update(TableRequest $request,Table $table)
    {
        $table->update($request->validated());
        return response()->json( $table);
    }

    public function destroy(Table $table)
    {
        $table->delete();
        return response()->json(null, 204);
    }
}
