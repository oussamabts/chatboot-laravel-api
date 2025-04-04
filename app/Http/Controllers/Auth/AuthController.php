<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\Auth\LoginResource;
use App\Http\Resources\Auth\RegisterResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        return RegisterResource::make(
            User::create($request->validated())
        );
    }

    public function login(LoginRequest $request)
    {
        $validatedData = $request->validated();

        $user = User::where("email" ,$validatedData["email"])->first();

        if (!$user && !Hash::check($validatedData['password'], $user->password))
        {
            abort(401);
        }

        return LoginResource::make($user);
    }
}
