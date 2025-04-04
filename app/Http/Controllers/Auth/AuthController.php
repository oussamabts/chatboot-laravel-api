<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\Auth\LoginResource;
use App\Http\Resources\Auth\RegisterResource;
use App\Http\Resources\CurrentAuthUserResource;
use App\Services\Constructors\AuthConstructor;
use App\Services\Facades\AuthFacade;

class AuthController extends Controller implements AuthConstructor
{
    /**
     * Register new user
     *
     * @param RegisterRequest $request
     * @return RegisterResource
     */
    public function register(RegisterRequest $request): RegisterResource
    {
        return AuthFacade::register($request);
    }

    /**
     * Login the user
     *
     * @param LoginRequest $request
     * @return LoginResource
     */
    public function login(LoginRequest $request): LoginResource
    {
        return AuthFacade::login($request);
    }

    /**
     * Get current auth user
     *
     * @return CurrentAuthUserResource
     */
    public function currentAuthUser() : CurrentAuthUserResource
    {
        return AuthFacade::currentAuthUser();
    }

    /**
     * Logout the user
     *
     * @return boolean
     */
    public function logout() : bool
    {
        return AuthFacade::logout();
    }
}
