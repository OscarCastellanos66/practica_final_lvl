@extends('theme.base')

@section('title', 'CREAR')

@section('content')
    <br>
    <div class="m-0 row justify-content-center">
        <div class="col-auto p-5 shadow p-3 mb-5 bg-body rounded-3">

            <form action="{{route('operator.store')}}" method="POST">
                @csrf
            
            <h2 class="fw-bold text-center">Crear operador</h2>

            <!--Nombre-->
            <div class="row g-3">
                <div class="col">
                    <strong>Nombre de usuario:</strong>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Username" value="{{old('name')}}">
                    @error('name')
                        <p class="form-text text-danger">The username field is required.</p>
                    @enderror
                </div>
            </div>

            <!--Email-->
            <div class="row g-3">
                <div class="col">
                    <strong>Correo electrónico</strong>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{old('email')}}">
                    @error('email')
                        <p class="form-text text-danger">{{$message}}</p>
                    @enderror
                </div>
            </div>

            <!--Password-->
            <div class="row g-3">
                <div class="col">
                    <strong>Contraseña</strong>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="{{old('password')}}">
                    @error('password')
                        <p class="form-text text-danger">{{$message}}</p>
                    @enderror
                </div>
            </div>

            <br>
            <button type="submit" class="btn btn-success">Crear</button>
            <a href="{{ route('admin.index') }}" class="btn btn-primary">Regresar</a>
            </form>
        </div>
    </div>
@endsection