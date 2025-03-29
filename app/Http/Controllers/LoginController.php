<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Models\User;

class LoginController extends Controller
{

    public function login() {
        return view('login');
    }

    // TODO: Implement JWT and storing active user
    public function submit (LoginRequest $request) {
        $user = User::where('email', $request->email)->first();

        if ($user == null) {
            return redirect()->back()->with('error', 'User with this email doesn\'t exists');
        }

        if (!password_verify($request->password, $user->password)) {
            return redirect()->back()->with('error', 'Wrong password');
        }

        return redirect()->route('home')->with('success', 'You are logged in');
    }
}
