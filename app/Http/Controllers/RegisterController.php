<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;    //korisnika dobijemo po difoltu

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:users,email',          //jer postoji pravilo koje se zove bas email / drugo je da bude email uniqe i koju tabelu treba da proverava users tabela kolona email
            'name' => 'required',
            'password' => 'required|min:6'
        ]);

            //// alternative \Hash::make)('')

        $data = $request->only(['email', 'name', 'password']);     

        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);
        auth()->login($user);     ///ovako smo ulogovali korisnika pre nego sto smo uradili redirekciju

         return redirect()->route('all-posts');
    }
}
