<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Coffee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;

class AdminController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            $admin = Auth::guard('admin')->user();
            $token = $admin->createToken('admin-token')->plainTextToken;

            return response()->json(['token' => $token], 200);
        }

        return response()->json(['message' => 'Unauthorized'], 401);
    }


    public function logout(Request $request)
    {
        $request->user('admin')->currentAccessToken()->delete();

        return response()->json(['message' => 'Logged out successfully'], 200);
    }


    private function authenticate(Request $request)
    {
        $token = $request->bearerToken();
        $accessToken = PersonalAccessToken::findToken($token);

        if (!$accessToken || $accessToken->tokenable_type !== Admin::class) {
            return response()->json(['message' => 'Unauthorized'], 401)->send();
        }

        return $accessToken->tokenable;
    }


    public function index(Request $request)
    {
        $this->authenticate($request);
        return Coffee::all();
    }


    public function store(Request $request)
    {
        $this->authenticate($request);
        $coffee = Coffee::create($request->all());
        return response()->json($coffee, 201);
    }


    public function update(Request $request, $id)
    {
        $this->authenticate($request);
        $coffee = Coffee::findOrFail($id);
        $coffee->update($request->all());
        return response()->json($coffee, 200);
    }
    

    public function destroy(Request $request, $id)
    {
        $this->authenticate($request);
        Coffee::destroy($id);
        return response()->json(null, 204);
    }
}
