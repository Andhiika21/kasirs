<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class SuperadminController extends Controller
{
    public function index() {
        return view('superadmin.index');
    }


    public function registrasi(){
        return view('registrasi');
    }


    public function registrasipost(Request $request){

        // dd($request->all());

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role_id = $request->role_id;

        $user->save();

        dd($user);
        
        // $data = $request->validate( [
        //     'name' => 'required',
        //     'email' => 'required',
        //     'password' => 'required',
        //     'role_id' => 'required',
        // ]);

        // $data['password'] = Hash::make($data['password']);
        
        // User::create($data);

        return back()->with('success', 'registrasi berhasil');
    }
}