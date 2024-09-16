<?php 

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthenController extends Controller
{
    public function register() {
        return view('auth.registration');
    }

    public function registerUser(Request $request) { 
        $request->validate([
            "name"=>  "required|min:8|max:100|string|unique:users",
            "email" => "required|email|unique:users",
            "password"=> "required|min:8"
        ]);

        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => $request->password,
        ]);

        if ($user) {
            return back()->with("success", "You have registered successfully!");
        } else {
            return back()->with("fail", "Something went wrong!");
        }
    }

    public function login() {
        return view('auth.login');
    }

    public function loginUser(Request $request) {
        $request->validate([
            "email" => "required|email",
            "password"=> "required|min:8"
        ]);
        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect()->intended("/")->with('success', 'You are logged in');
        } else {
            return back()->with("fail", 'Invalid email or password');
        }
        
        
    }

    public function dashboard() {
        $posts = Post::paginate(5);
        $user = Auth::user();

        return view("welcome", [
            "data" => $user,
            "posts" => $posts
        ]);
    }

    public function logout() {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect("/");
    }
}
