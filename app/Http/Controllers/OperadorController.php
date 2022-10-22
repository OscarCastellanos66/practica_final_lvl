<?php

namespace App\Http\Controllers;

use App\Mail\SolicitudMail;
use App\Models\User;
use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class OperadorController extends Controller
{
    public function index(){

        $usuario = User::where('solicitud', 'pendiente')->paginate(15);

        return view('operador.index')->with('usuarios',$usuario);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $operador
     * @return \Illuminate\Http\Response
     */
    public function show(User $operador)
    {
        return view('errors.404');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $operador
     * @return \Illuminate\Http\Response
     */
    public function edit(User $operador)
    {
        return view('operador.solicitud')
            ->with('usuario',$operador);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $operador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $operador)
    { 
        $operador->email = $request['email'];
        $operador->solicitud = $request['solicitud'];
        $operador->save();

        Session::flash('mensaje', 'Solicitud actualizada!');

        //Envio de correo
        if($request['solicitud'] != 'pendiente'){
            $correo = new SolicitudMail($request->all());
            Mail::to($correo->email = $request['email'])->send($correo);
        }

        return redirect()->route('operador.index');
    }
}
