<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;

use App\Mail\pass;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function create(){
        return view('auth.register');
    }

    public function store(Request $request){
        
        $password = Str::random(8);
        $token = Crypt::encryptString($password);

        //Edad
        $date = Carbon::createFromDate($request->fecha)->age;

        $request->validate([
            'name' => 'required',
            'name2' => 'required',
            'apellido' => 'required',
            'apellido2' => 'required',
            'fecha' => 'required',
            'dpi' => 'required',
            'salario' => 'required',
            'email' => ['required','email','unique:users'],    
            'foto' => ['required', 'image', 'mimes:png,jpg', 'max:2048', 'dimensions:width=600,height=400'],    
        ]);

        if($date<18){
            echo'<script type="text/javascript">
            alert("Error al registrarse! Eres menor de edad");
            window.location.href="register";
            </script>';   
        }else{

            $user = new User;
                $user->name = $request->name;
                $user->name2 = $request->name2;
                $user->apellido = $request->apellido;
                $user->apellido2 = $request->apellido2;
                $user->casada = $request->casada;
                $user->fecha = $request->fecha;
                $user->dpi = $request->dpi;
                $user->profesion = $request->profesion;
                $user->laborando = $request->laborando;
                $user->salario = $request->salario;
                $user->email = $request->email;
                $user->password = $password;
                $user->token = $token;
                $user->solicitud = 'pendiente';
                $user->foto = $request->file('foto')->store('uploads', 'public');
            $user->save();

            auth()->login($user);

            //Envio de correo       
            $correo = new pass($request->all());
            Mail::to($correo->email = $request['email'])->send($correo);
            
            Session::flash('mensaje', ' Revise su correo electrónico para ver sus credenciales de inicio de sesión.');

            return redirect()->route('user.index');
        }
    }
}
