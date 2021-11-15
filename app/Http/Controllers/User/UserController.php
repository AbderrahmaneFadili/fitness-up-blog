<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(User $user)
    {
        return view('user.profile', [
            "user" => $user
        ]);
    }

    public function edit(Request $request, User $user)
    {
        return view('user.edit', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, User $user)
    {
        $editUser = User::find($user->id);



        //validation
        $this->validate($request, [
            "name" => "required|max:255",
            "email" => "required|email|unique:users|max:255",
            "password" => "required|confirmed",
        ]);

        $editUser->update([
            "name" => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);


        return back()->with('status', 'your account is updated');
    }
}
