<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Models\UserLoginLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $user = User::find(Auth::user()->id);
        $user->token = $user->createToken('auth_token')->plainTextToken;

        if ($user) {
            return $this->apiResponse->successResponse('Usuario autenticado :)', $user->toArray());
        } else {
            return $this->apiResponse->errorResponse('Wrong error', []);
        }
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        Session::flush();
        Session::regenerateToken();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return response()->noContent();
    }
}
