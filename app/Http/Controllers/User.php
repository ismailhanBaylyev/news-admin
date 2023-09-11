<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Users;

class User extends Controller
{
    public function listView(string $name = null){
        Paginator::useBootstrap();
        $users = Users::orderBy($name != null ? $name : 'updated_at', 'DESC')->paginate(10);
        return view('users/users', ['users'=>$users]);
    }
    public function addView(){
        return view('users/users_add');
    }
    public function addUser(Request $req){

        $req->validate( 
        [
            'email' => 'required',
            'password' => 'required | min:8'
        ],
        [
            'login.required' => 'Заполните это поля',
            'password.required' => 'Заполните это поля',
            'password.min' => 'Минимум символов: 8',
        ]
        );

        $users = new Users;
        $users->email = $req->email;
        $users->password = Hash::make($req->password);
        $users->save();

        return redirect('/users');
    }

    public function editView($id){
        $users = Users::where('id', $id)->get();
        return view('users/users_edit', ['users'=>$users]);
    }
    public function editUser(Request $req, $id){

        $req->validate( 
        [
            'email' => 'required',
            'password' => 'min:8'
        ],
        [
            'login.required' => 'Заполните это поля',
            'password.min' => 'Минимум символов: 8',
        ]
        );

        $users = Users::find($id);
        $users->email = $req->email;
        if($req->password != ""){
            $users->password = Hash::make($req->password);
        }
        $users->save();

        return redirect('/users');
    }
}
