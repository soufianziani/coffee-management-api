<?php

namespace App\Http\Controllers;

use App\Http\Requests\CoffeeRequest;
use App\Models\Coffee;
    use Illuminate\Http\Request;

class CoffeeController extends Controller
{
    public function index()
    {
        $coffee = Coffee::all();
        return response()->json($coffee);
    }

    public function store(CoffeeRequest $request)
    {
        $coffee = Coffee::create($request->validated());
        return response()->json($coffee, 201);
    }

    public function show(Coffee $coffee)
    {
        return response()->json($coffee);
    }

    public function update(CoffeeRequest $request, coffee $coffee)
    {
        $coffee->update($request->validated());
        return response()->json( $coffee);
    }

    public function destroy(Coffee $Coffee)
    {
        $Coffee->delete();
        return response()->json(null,204);
    }
}
