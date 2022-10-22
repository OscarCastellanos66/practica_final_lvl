@extends('theme.base')

@section('title', 'OPERADOR')

@section('content')
    <br>
    <div class="shadow p-3 mb-5 bg-body rounded-3 container d-flex justify-content-center">
        <form action="{{route('operador.update', $usuario)}}" method="POST">
            @csrf
        @method('PUT')
        
        <h2 class="fw-bold text-center">Información del usuario</h2>

        <center><img src="{{asset('storage').'/'.$usuario->foto}}" width="150px"></center>

        <!--Nombre-->
        <span><strong>Nombre: </strong>{{@$usuario->name .' '. 
                @$usuario->name2 .' '.
                @$usuario->apellido .' '.
                @$usuario->apellido2
            }}
        </span><br>
        <!--Apellido de casada-->
        @if (@$user->casada != null)
            <span><strong>Apellido de casada: </strong>{{@$user->casada}}</span><br>
        @endif
        <!--Fecha de nacimiento-->
        <span><strong>Fecha de nacimiento: </strong>{{@$usuario->fecha}}</span><br>
        <!--DPI-->
        <span><strong>Documento de identificación: </strong>{{@$usuario->dpi}}</span><br>
        <!--Profesión-->
        @if (@$usuario->profesion !=null)
            <span><strong>Profesión: </strong>{{@$usuario->profesion}}</span><br>            
        @endif
        <!--Años laborando-->
        @if (@$usuario->laborando !=null)
            <span><strong>Años laborando: </strong>{{@$usuario->laborando}}</span><br>            
        @endif
        <!--Salario-->
        <span><strong>Salario: </strong>{{@$usuario->salario}}</span><br>

        <!--Email-->
        <div class="row g-3">
            <div class="col">
                <span><strong>Correo electrónico: </strong>{{@$usuario->email}}</span><br>

                <!--Bloqueo el input-->
                <input style="display: none;" type="email" class="form-control" id="email" name="email" readonly="" placeholder="Email" value="{{@$usuario->email}}">
                @error('email')
                    <p class="form-text text-danger">{{$message}}</p>
                @enderror
            </div>
        </div>
        <br>
        <!--Solicitud-->
        <span>
            <strong>Solicitud</strong>
            <select class="form-select" name="solicitud" id="solicitud">
                <option>{{@$usuario->solicitud}}</option>
                <option>aceptado</option>
                <option>rechazado</option>
            </select>
        </span>

        <br>
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('operador.index') }}" class="btn btn-primary">Regresar</a>
        </form>
    </div>
@endsection