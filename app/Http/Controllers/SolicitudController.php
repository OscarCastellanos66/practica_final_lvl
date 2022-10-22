<?php

namespace App\Http\Controllers;

use App\Mail\SolicitudMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class SolicitudController extends Controller
{
    public function index(){
        $usuario = User::where('solicitud', 'pendiente')->paginate(15);
        return view('admin.solicitud.index')->with('usuarios',$usuario);
    }

    public function edit(User $solicitud)
    {
        return view('admin.solicitud.edit')
            ->with('usuario',$solicitud);
    }
 
    public function update(Request $request, User $solicitud)
    {

        $solicitud->email = $request['email'];
        $solicitud->solicitud = $request['solicitud'];

        $solicitud->save();

        Session::flash('mensaje', 'Solicitud actualizada!');

        //Envio de correo
        if($request['solicitud'] != 'pendiente'){
            $correo = new SolicitudMail($request->all());
            Mail::to($correo->email = $request['email'])->send($correo);
        }
        
        return redirect()->route('solicitud.index');
    }
}
