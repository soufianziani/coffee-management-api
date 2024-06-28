<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Coffee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;


class AdminController extends Controller
{

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if (!$admin || !Hash::check($request->password, $admin->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $token = $admin->createToken('admin-token')->plainTextToken;

        return response()->json(['token' => $token], 200);
    }


    public function logout(Request $request)
    {
        $user = Auth::guard('sanctum')->user();

        if ($user) {
            $user->currentAccessToken()->delete();
            return response()->json(['message' => 'Logged out successfully'], 200);
        } else {
            return response()->json(['message' => 'No user authenticated'], 401);
        }
    }


}