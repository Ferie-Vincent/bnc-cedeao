<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Auth\Events\Registered;
use App\Notifications\RegisteredUser;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    //
    public function index(){
        return view('authetification.login');
    }
    
    public function login(Request $request): RedirectResponse {
        try {
            //code...
            //dd($request->all());
            // 1 Followers
            // 2 Redacteur
            // 3 Administrateur
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);
            
            if(Auth::attempt($credentials)){
                //dd(Auth::user());
                return redirect('/tableau_de_gestion');
            }else{
               return redirect('/')->with('error','Infromation invalide, veiller contacter notre service client');
            } 

        }catch(\Throwable $th) {
            //throw $th;
            dd($th);
            $error = "Une erreur s'est produite, veuillez réessayer plus tard.";
            Log::error($th->getMessage());
            return redirect()->back()->with('danger', 'error');
        }
    }

    public function logout(){
        try {
            //code...
            Session::flush();
            Auth::logout();
            return redirect('/');

        } catch (\Throwable $th) {
            //throw $th;
            $error = "Une erreur s'est produite, veuillez réessayer plus tard.";
            Log::error($th->getMessage());
            dd($th);
        }
    }

    public function updateInfoUser(){
        try {
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
