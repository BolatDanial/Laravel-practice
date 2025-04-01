<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Models\Topic;
use App\Models\Avatars;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{

    public function showRegisterForm() {
        return view('register');
    }

    public function showLoginForm() {
        return view('login');
    }

    public function register(RegisterRequest $request) {

        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));

        $user->save();

        return redirect()->route('login')->with('success', 'You have been registered successfully');
    }

    public function login (LoginRequest $request) {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('home')->with('success', 'You are now logged in');
        }

        return back()->withErrors(['email' => 'There is no account with this email or password. Try to register!']);
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'You have been logged out');
    }

    public function profile() {
        $avatar = Avatars::where('user_id', Auth::id())->first();
        if (!$avatar) {
            $avatar = new Avatars;
            $avatar->name = "Default";
            $avatar->path = "images/Default.jpg";
        }
        return view('profile', ['topics' => Topic::where('user_id', Auth::id())->get(), 'avatar' => $avatar]);
    }

    public function profileRedactionForm() {
        return view('profileRedactionForm', ['user' => Auth::user()]);
    }

    public function profileRedaction(Request $request) {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();
        $user->name = $request->input('name');
        $user->save();

        if ($request->hasFile('image')) {
            if (!request()->file('image')->isValid()) {
                return redirect()->route('profile')->with('error', 'Wrong file');
            }

            $path = $request->file('image')->store('images', 'public');

            if ($path) {
                Log::info('File stored successfully', ['path' => $path]);
            } else {
                Log::error('File storage failed - path is null.');
            }

            $avatar = Avatars::where('user_id', Auth::id())->first();

            if ($avatar && $avatar->path) {
                Storage::disk('public')->delete($avatar->path);
            }

            if (!$avatar) {
                $avatar = new Avatars();
                $avatar->user_id = Auth::id();
            }

            $avatar->path = $path;
            $avatar->save();
        }

        return redirect()->route('profile')->with('success', 'Your profile was updated successfully');
    }
}
