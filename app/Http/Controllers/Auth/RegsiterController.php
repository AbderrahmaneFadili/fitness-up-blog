<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegsiterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        //validation
        $this->validate($request, [
            "name" => "required|max:255",
            "email" => "required|email|max:255",
            "password" => "required|confirmed",
        ]);

        //create user & store it
        User::create(array(
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ));

        //log in to the blog
        Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);

        //redirect to blog page
        return redirect()->route('blog');
    }
}
