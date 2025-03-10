<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('login', 'password');
        if (Auth::attempt(['login' => $credentials['login'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();
            $response['name'] = Auth::user()->name;
            return $this->successResponse($response);
        }
        return $this->errorResponse('Unauthorized', 401);
    }

    public function loginOtherApp(LoginRequest $request)
    {
        $credentials = $request->only('login', 'password');
        if (Auth::attempt(['login' => $credentials['login'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();
            $response['token'] = Auth::user()->createToken('MyApp')->plainTextToken;
            return $this->successResponse($response);
        }
        return $this->errorResponse('Unauthorized', 401);
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
    }
}
