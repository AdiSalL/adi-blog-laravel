<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class AuthenController extends Controller
{
    //
    public function register() {
        return view('auth.registration');
    }

    public function registerUser(Request $request){ 
        $request->validate([
            "name"=>  "required|min:8|max:100|string",
            "email" => "required|email:users",
            "password"=> "required|min:8"
        ]);

        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);
        

        if($user) {
            return back()->with("success", "You have registered successfully!");
        }else {
            return back()->with("fail", "Something wrong!");
        }
    }

    public function login() {
        return view('auth.login');
    }

    public function loginUser(Request $request) {
        $request->validate([
            "email" => "required|email:users",
            "password" => "required|min:8"
        ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended("/");
        }else {
            return back()->with("fail", 'Invalid name or password');
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
        return redirect("/");
    }

}

