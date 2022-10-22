@extends('theme.base')

@section('title', 'HOME')

@section('content')
@if (Session::has('mensaje'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Se ha registrado correctamente!</strong>
    {{Session::get('mensaje')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

    <br>
    <div class="m-0 row justify-content-center">
        <div class="col-auto p-5 shadow p-3 mb-5 bg-body rounded-3">
            <h2>Perfil:</h2><br>
            
            <center><img src="{{asset('storage').'/'.auth()->user()->foto}}" width="150px"></center>
            
            <!--Nombre completo -->
            <span><strong>Nombre: </strong>{{auth()->user()->name .' '. 
                    auth()->user()->name2 .' '.
                    auth()->user()->apellido .' '.
                    auth()->user()->apellido2
                }}
            </span><br>

            <!--Apellido de casada-->
            @if (auth()->user()->casada != null)
                <span><strong>Apellido de casada: </strong>{{auth()->user()->casada}}</span><br>
            @endif

            <!--Fecha de nacimiento-->
            <span><strong>Fecha de nacimiento: </strong>{{auth()->user()->fecha}}</span><br>

            <!--DPI-->
            <span><strong>Documento de identificación: </strong>{{auth()->user()->dpi}}</span><br>

            <!--Profesión-->
            @if (auth()->user()->profesion !=null)
                <span><strong>Profesión: </strong>{{auth()->user()->profesion}}</span><br>            
            @endif

            <!--Años laborando-->
            @if (auth()->user()->laborando !=null)
                <span><strong>Años laborando: </strong>{{auth()->user()->laborando}}</span><br>            
            @endif

            <!--Salario-->
            <span><strong>Salario: </strong>{{auth()->user()->salario}}</span><br>

            <!--Email-->
            <span><strong>Correo electrónico: </strong>{{auth()->user()->email}}</span><br>
            
            <!--Solicitudes-->
            @if(auth()->user()->solicitud == 'pendiente')
                <strong>Estado: </strong><span class="badge bg-warning text-white fw-bold">{{auth()->user()->solicitud}}</span><br>
            @endif

            @if (auth()->user()->solicitud == 'aceptado')
                <strong>Estado: </strong><span class="badge bg-success text-white fw-bold">{{auth()->user()->solicitud}}</span><br> 
            @endif

            @if (auth()->user()->solicitud == 'rechazado')
                <strong>Estado: </strong><span class="badge bg-danger text-white fw-bold">{{auth()->user()->solicitud}}</span><br>
            @endif
        </div>
    </div>
@endsection