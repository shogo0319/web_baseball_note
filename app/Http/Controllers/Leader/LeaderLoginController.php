<?php

namespace App\Http\Controllers\Leader;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LeaderLoginController extends Controller
{
    public function showLoginPage(): View
    {
        return view('leader.auth.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->only(['email', 'password']);

        if (Auth::guard('leader')->attempt($credentials)) {
            return redirect()->route('leader_players')->with([
                'login_msg' => 'ログインしました。',
            ]);
        }

        return back()->withErrors([
            'login' => ['ログインに失敗しました'],
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('leader')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('leader.login')->with('logout_msg', 'ログアウトしました。');
    }


}
