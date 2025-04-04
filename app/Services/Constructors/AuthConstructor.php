<?php

namespace App\Services\Constructors;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\Auth\LoginResource;
use App\Http\Resources\Auth\RegisterResource;
use App\Http\Resources\CurrentAuthUserResource;

interface AuthConstructor
{
    /**
     * Register new user
     *
     * @param RegisterRequest $request
     * @return RegisterResource
     */
    public function register(RegisterRequest $request) : RegisterResource;

    /**
     * Login the user
     *
     * @param LoginRequest $request
     * @return LoginResource
     */
    public function login(LoginRequest $request) : LoginResource;

    /**
     * Get current authenticated user
     *
     * @return CurrentAuthUserResource
     */
    public function currentAuthUser() : CurrentAuthUserResource;

    /**
     * logout current authenticated user
     *
     * @return boolean
     */
    public function logout() : bool;
}
