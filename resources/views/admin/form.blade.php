@extends('theme.base')

@section('title', 'ADMIN')

@section('content')
    <br>
    <div class="shadow p-3 mb-5 bg-body rounded-3 container d-flex justify-content-center">

        <form action="{{route('admin.update', $usuario)}}" method="POST">
            @csrf
        @method('PUT')
        
        <h2 class="fw-bold text-center">Editar usuario</h2>

        <!--Fotografia-->
        <center><img src="{{asset('storage').'/'.$usuario->foto}}" width="150px"><br></center>

        <!--Solicitud-->
        @if(@$usuario->solicitud == 'pendiente')
            <strong>Estado: </strong><span class="badge bg-warning text-white fw-bold">{{@$usuario->solicitud}}</span><br>
        @endif

        @if (@$usuario->solicitud == 'aceptado')
            <strong>Estado: </strong><span class="badge bg-success text-white fw-bold">{{@$usuario->solicitud}}</span><br> 
        @endif

        @if (@$usuario->solicitud == 'rechazado')
            <strong>Estado: </strong><span class="badge bg-danger text-white fw-bold">{{@$usuario->solicitud}}</span><br>
        @endif
        
        <br>
        <!--Nombres-->
        <div class="row g-3">
            <div class="col">
                <strong>Nombres:</strong>
                <input type="text" class="form-control" id="name" name="name" placeholder="Primer nombre" value="{{@$usuario->name}}">
                @error('name')
                    <p class="form-text text-danger">El campo 'Primer nombre' es obligatorio.</p>
                @enderror
            </div>
            <div class="col">
                <br>
                <input type="text" class="form-control" id="name2" name="name2" placeholder="Segundo nombre" value="{{@$usuario->name2}}">
                @error('name2')
                    <p class="form-text text-danger">El campo 'Segundo nombre' es obligatorio.</p>
                @enderror
            </div>
        </div>

        <!--Apellidos-->
        <div class="row g-3">
            <div class="col">
                <strong>Apellidos</strong>
                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Primer apellido" value="{{@$usuario->apellido}}">
                @error('apellido')
                    <p class="form-text text-danger">El campo 'Primer apellido' es obligatorio.</p>
                @enderror
            </div>
            <div class="col">
                <br>
                <input type="text" class="form-control" id="apellido2" name="apellido2" placeholder="Segundo apellido" value="{{@$usuario->apellido2}}">
                @error('apellido2')
                    <p class="form-text text-danger">El campo 'Segundo apellido' es obligatorio.</p>
                @enderror
            </div>
            <div class="col">
                <strong>Apellido de casada:</strong>
                <input type="text" class="form-control" id="casada" name="casada" placeholder="Apellido de casada" value="{{@$usuario->casada}}">
                @error('casada')
                    <p class="form-text text-danger">El campo 'Apellido de casada' es obligatorio.</p>
                @enderror
            </div>
        </div>

        <!--Fecha de nacimiento-->
        <div class="row g-3">
            <div class="col">
                <strong>Fecha de nacimiento</strong>
                <input type="date" class="form-control" id="fecha" name="fecha" placeholder="Fecha de nacimiento" value="{{@$usuario->fecha}}">
                @error('fecha')
                    <p class="form-text text-danger">El campo 'Fecha de nacimiento' es obligatorio.</p>
                @enderror
            </div>
        </div>

        <!--DPI-->
        <div class="row g-3">
            <div class="col">
                <strong>Documento de identificación</strong>
                <input type="text" class="form-control" id="dpi" name="dpi" placeholder="Documento de identificación" value="{{@$usuario->dpi}}">
                @error('dpi')
                    <p class="form-text text-danger">El campo 'Documento de identificación' es obligatorio.</p>
                @enderror
            </div>
        </div>

        <!--Profesion-->
        <div class="row g-3">
            <div class="col">
                <strong>Profesión</strong>
                <input type="text" class="form-control" id="profesion" name="profesion" placeholder="Profesión" value="{{@$usuario->profesion}}">
                @error('profesion')
                    <p class="form-text text-danger">El campo 'Profesión' es obligatorio.</p>
                @enderror
            </div>
        </div>

        <!--Años laborando-->
        <div class="row g-3">
            <div class="col">
                <strong>Años laborando</strong>
                <input type="number" class="form-control" id="laborando" name="laborando" placeholder="Años laborando" value="{{@$usuario->laborando}}">
                @error('laborando')
                    <p class="form-text text-danger">El campo 'Años laboradno' es obligatorio.</p>
                @enderror
            </div>
        </div>

        <!--Salario-->
        <div class="row g-3">
            <div class="col">
                <strong>Salario</strong>
                <input type="number" class="form-control" id="salario" name="salario" placeholder="Salario" value="{{@$usuario->salario}}">
                @error('salario')
                    <p class="form-text text-danger">El campo 'Salario' es obligatorio.</p>
                @enderror
            </div>
        </div>

        <!--Email-->
        <div class="row g-3">
            <div class="col">
                <strong>Correo electrónico</strong>
                <input type="email" class="form-control" id="email" name="email" placeholder="Correo electrónico" value="{{@$usuario->email}}">
            </div>
        </div>

        <br>
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('admin.index') }}" class="btn btn-primary">Regresar</a>
        </form>
    </div>
@endsection