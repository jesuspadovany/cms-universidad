<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function __construct() {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        $credentials = $request->only('email', 'password');

        if (! Auth::attempt($credentials)) {
            $this->sendFailedLoginResponse();
        }

        return redirect()->intended();
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ], [], [
            'email' => 'correo electrónico',
            'password' => 'contraseña'
        ]);
    }

    protected function sendFailedLoginResponse()
    {
        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);
    }

    public function logout()
    {
        Auth::logout();

        session()->invalidate();

        session()->regenerateToken();

        return redirect()->route('login');
    }
}
