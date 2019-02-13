<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function logout()
    {
        auth()->logout(); 
        return redirect()->route('all-posts');    //u starom je posts.index
    }

    public function create()
    {
        return view('auth.login');    ///iza tacke je naziv direktorijuma
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',          //jer postoji pravilo koje se zove bas email / drugo je da bude email uniqe i koju tabelu treba da proverava users tabela kolona email
            'password' => 'required'
        ]);

            //// alternative \Hash::make)('')

        if (!auth()->attempt($request->only(['email', 'password']))) {
            return back()->withErrors(               /////ovim ga vraca na login stranicu i prikazuje errors koji nam trebaju
                [                                   ////a back sam po sebi ne trazi redirect, suvisan je 
                    'message' => 'Wrong login credentionals!'
                ]
            );                              
        }   
         return redirect()->route('all-posts');
    }
}
