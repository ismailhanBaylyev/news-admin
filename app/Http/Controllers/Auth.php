<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Users;

class Auth extends Controller
{
    public function index()
    {
        return view('auth/auth');
    }

    public function auth(Request $req)
    {
        $users = Users::all();

        $validator = \Validator::make(request()->all(), 
        [
            'email' => 'required',
            'password' => 'required | min:8'
        ],
        [
            'email.required' => 'Заполните это поля',
            'password.required' => 'Заполните это поля',
            'password.min' => 'Минимум символов: 8',
        ]
        );

        foreach ($users as $user) {
            if($req->email == $user['email'] && Hash::check($req->password, $user['password'])){
                $req->session()->put('user', $user['id']);
                $req->session()->put('email', $user['email']);
                return redirect('/users');
            }
        }

        $validator->after(function ($validator) {
        if (request('auth') == null) {
            $validator->errors()->add('auth', 'Не правильный Email или пароль');
        }
    
    });
    $validator->validate();
  }
  
  public function logout(){
    if(session()->has('user')){
        session()->pull('user');
    }
    return redirect('/auth');
  }
}
