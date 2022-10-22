@extends('theme.base')

@section('title', 'HOME')

@section('content')
    <br>
    <div class="m-0 row justify-content-center">
        <div class="col-auto p-5 shadow p-3 mb-5 bg-body rounded-3">
            <h2>Perfil:</h2><br>

            <center><img src="{{asset('storage').'/'.$user->foto}}" width="150px"><br></center>

            <!--Nombre-->
            <span><strong>Nombre: </strong>{{@$user->name .' '. 
                    @$user->name2 .' '.
                    @$user->apellido .' '.
                    @$user->apellido2
                }}
            </span><br>
            <!--Apellido de casada-->
            @if (@$user->casada != null)
                <span><strong>Apellido de casada: </strong>{{@$user->casada}}</span><br>
            @endif
            <!--Fecha de nacimiento-->
            <span><strong>Fecha de nacimiento: </strong>{{@$user->fecha}}</span><br>
            <!--DPI-->
            <span><strong>Documento de identificación: </strong>{{@$user->dpi}}</span><br>
            <!--Profesión-->
            @if (@$user->profesion !=null)
                <span><strong>Profesión: </strong>{{@$user->profesion}}</span><br>            
            @endif
            <!--Años laborando-->
            @if (@$user->laborando !=null)
                <span><strong>Años laborando: </strong>{{@$user->laborando}}</span><br>            
            @endif
            <!--Salario-->
            <span><strong>Salario: </strong>{{@$user->salario}}</span><br>
            <!--Email-->
            <span><strong>Correo electrónico: </strong>{{@$user->email}}</span><br>
            <!--Solicitudes-->
            @if(@$user->solicitud == 'pendiente')
                <strong>Estado: </strong><span class="badge bg-warning text-white fw-bold">{{@$user->solicitud}}</span><br>
            @endif

            @if (@$user->solicitud == 'aceptado')
                <strong>Estado: </strong><span class="badge bg-success text-white fw-bold">{{@$user->solicitud}}</span><br> 
            @endif

            @if (@$user->solicitud == 'rechazado')
                <strong>Estado: </strong><span class="badge bg-danger text-white fw-bold">{{@$user->solicitud}}</span><br>
            @endif

            <br>
            <a href="{{ route('admin.index') }}" class="btn btn-primary"><i class="fa-solid fa-chevron-left"></i></a>
        </div>
    </div>
@endsection