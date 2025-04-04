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
    public function register(RegisterRequest $request): RegisterResource
    {
        return AuthFacade::register($request);
    }

    public function login(LoginRequest $request): LoginResource
    {
        return AuthFacade::login($request);
    }

    public function currentAuthUser() : CurrentAuthUserResource
    {
        return AuthFacade::currentAuthUser();
    }

    public function logout() : bool
    {
        return AuthFacade::logout();
    }
}
