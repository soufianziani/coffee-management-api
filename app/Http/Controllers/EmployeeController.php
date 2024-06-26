<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $empolyees = Employee::all();
        return response()->json($empolyees);
    }

    public function store(EmployeeRequest $request)
    {
        $employees = Employee::create($request->validated());
        return response()->json($employees, 201);
    }

    public function show(Employee $employee)
    {
        return response()->json($employee);
    }

    public function update(EmployeeRequest $request, Employee $employee)
    {
        $employee->update($request->validated());
        return response()->json( $employee);
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return response()->json(null, 204);
    }
}
