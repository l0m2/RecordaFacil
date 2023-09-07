<?php

namespace App\Http\Controllers;

use App\Mail\cadastro;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }

    public function register(){
        return view('register');
    }

    public function entrar(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        
        if(Auth::attempt($request->only('email','password'))){
            return redirect()->route('tarefas');
        }
       return redirect()->route('login');
    }

    public function cadastro(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
       if($request['password'] == $request['password_confirmation']){
        if(User::create($request->all())){
          Mail::to($request['email'])->send(new cadastro($request['name']));
           return redirect()->route('login');
        } }
            return redirect()->route('register');
    }




}
