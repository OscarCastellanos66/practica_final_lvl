<?php

namespace App\Http\Controllers;

use App\Mail\pass;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function index(){
        $usuario = User::where('role', 'user')->paginate(15);
        return view('admin.index')->with('usuarios',$usuario);
    }

    public function create()
    {
        return view('admin.create');
    }

    //crear usuarios
    public function store(Request $request)
    {

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
            window.location.href="admin/create";
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

            return redirect()->route('admin.index');
        }
    }

    public function show(User $admin)
    {
        return view('errors.404');
    }

    public function edit(User $admin)
    {
        return view('admin.form')
            ->with('usuario',$admin);
    }
 
    public function update(Request $request, User $admin)
    { 

        $request->validate([
            'name' => 'required',
            'name2' => 'required',
            'apellido' => 'required',
            'apellido2' => 'required',
            'fecha' => 'required',
            'dpi' => 'required',
            'salario' => 'required',
            'email' => ['required', Rule::unique('users')->ignore($admin)]  
        ]);

        $admin->name = $request['name'];
        $admin->name2 = $request['name2'];
        $admin->apellido = $request['apellido'];
        $admin->apellido2 = $request['apellido2'];
        $admin->casada = $request['casada'];
        $admin->fecha = $request['fecha'];
        $admin->dpi = $request['dpi'];
        $admin->profesion = $request['profesion'];
        $admin->laborando = $request['laborando'];
        $admin->salario = $request['salario'];
        $admin->email = $request['email'];

        $admin->save();

        Session::flash('mensaje', 'Registro editado con exito!');

        return redirect()->route('admin.index');
    }

    public function destroy(User $admin)
    {
        $admin->delete();

        Session::flash('mensaje', 'Registro eliminado con exito!');

        return redirect()->route('admin.index');
    }
}
