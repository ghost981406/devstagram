<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class RegisterController extends Controller
{
    public function index() 
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:35',
            'username' => 'required|unique:users|min:3|max:15',
            'email' => 'required|unique:users|email|max:40',
            'password' => 'required|confirmed|min:6',
        ]);
        
        User::create([
            'name' => $request->name,
            'username' => Str::slug ($request->username),
            'email' => $request->email,
            'password' => $request->password
        ]);

        //Autenticar usuarios
        auth()->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]);

        //otra forma de autenticar
        //auth()->attempt($request->only('email', 'password'));

        //redirecciona usuarios
        return redirect()->route('posts.index');

    }
}
