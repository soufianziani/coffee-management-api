<?php

namespace App\Http\Controllers;

use App\Http\Requests\CoffeeRequest;
use App\Models\Coffee;
    use Illuminate\Http\Request;

class CoffeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coffee = Coffee::all();
        return response()->json($coffee);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CoffeeRequest $request)
    {
        $coffee = Coffee::create($request->validated());
        return response()->json($coffee, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Coffee $coffee)
    {
        return response()->json($coffee);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CoffeeRequest $request, coffee $coffee)
    {
        $coffee->update($request->validated());
        return response()->json( $coffee);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coffee $Coffee)
    {
        $Coffee->delete();
        return response()->json(null,204);
    }
}
