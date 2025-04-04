<?php

namespace App\Services\Services;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\Auth\LoginResource;
use App\Http\Resources\Auth\RegisterResource;
use App\Http\Resources\CurrentAuthUserResource;
use App\Models\User;
use App\Services\Constructors\AuthConstructor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService implements AuthConstructor
{
    /**
     * Register New User
     *
     * @param RegisterRequest $request
     * @return RegisterResource
     */
    public function register(RegisterRequest $request) : RegisterResource
    {
        return RegisterResource::make(
            User::create($request->validated())
        );
    }

    /**
     * Login The User
     *
     * @param LoginRequest $request
     * @return LoginResource
     */
    public function login(LoginRequest $request) : LoginResource
    {
        $validatedData = $request->validated();

        $user = User::where("email" ,$validatedData["email"])->first();

        if (!$user && !Hash::check($validatedData['password'], $user->password))
        {
            abort(401);
        }

        return LoginResource::make($user);
    }

    /**
     * Get current authenticated user
     *
     * @return CurrentAuthUserResource
     */
    public function currentAuthUser() : CurrentAuthUserResource
    {
        $user = Auth::user();
        return CurrentAuthUserResource::make($user);
    }

    /**
     * Logout The User
     *
     * @return boolean
     */
    public function logout() : bool
    {
        return Auth::user()->token()->revoke();
    }
}
