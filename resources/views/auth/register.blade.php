@extends('theme.base')

@section('title', 'REGISTER')

@section('content')
<br>
<div class="container">
    <div class="row vh-100 justify-content-center align-items-center">        
        <div class="shadow p-3 mb-5 bg-body rounded-3 col-auto p-5">
            <center><h1>REGISTER</h1></center><br>

            <form class="needs-validation" action="" method="POST" enctype="multipart/form-data">
            @csrf
                <!-- Nombres -->
                <div class="row g-3">
                    <div class="col">
                        <label for="name" class="form-label">Primer nombre:</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Primer nombre" value="{{old('name')}}">
                        @error('name')
                            <p class="form-text text-danger">El campo 'Primer nombre' es obligatorio.</p>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="name2" class="form-label">Segundo nombre:</label>
                        <input type="text" class="form-control" id="name2" name="name2" placeholder="Segundo nombre" value="{{old('name2')}}">
                        @error('name2')
                            <p class="form-text text-danger">El campo 'Segundo nombre' es obligatorio.</p>
                        @enderror
                    </div>
                </div>
                <!-- Apellidos -->
                <div class="row g-3">
                    <div class="col">
                        <label for="apellido" class="form-label">Primer apellido:</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Primer apellido" value="{{old('apellido2')}}">
                        @error('apellido')
                            <p class="form-text text-danger">El campo 'Primer apellido' es obligatorio.</p>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="apellido2" class="form-label">Segundo apellido:</label>
                        <input type="text" class="form-control" id="apellido2" name="apellido2" placeholder="Segundo apellido" value="{{old('apellido2')}}">
                        @error('apellido2')
                            <p class="form-text text-danger">El campo 'Segundo apellido' es obligatorio.</p>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="casada" class="form-label">Apellido de casada:</label>
                        <input type="text" class="form-control" id="casada" name="casada" placeholder="Apellido de casada" value="{{old('casada')}}">
                        @error('casada')
                            <p class="form-text text-danger">El campo 'Apellido de casda' es obligatorio.</p>
                        @enderror
                    </div>
                </div>
                
                <!-- Fecha de nacimiento -->
                <label for="fecha" class="form-label">Fecha de nacimiento:</label>
                <input type="date" class="form-control" id="fecha" name="fecha" placeholder="Fecha de nacimiento" value="{{old('fecha')}}">
                @error('fecha')
                    <p class="form-text text-danger">El campo 'Fecha de nacimiento' es obligatorio.</p>
                @enderror

                <!-- DPI -->
                <label for="dpi" class="form-label">Documento de indentificacion:</label>
                <input type="text" class="form-control" id="dpi" name="dpi" placeholder="DPI" value="{{old('dpi')}}">
                @error('dpi')
                    <p class="form-text text-danger">El campo 'DPI' es obligatorio.</p>
                @enderror
                
                <!-- Profesion -->
                <label for="profesion" class="form-label">Profesión:</label>
                <input type="text" class="form-control" id="profesion" name="profesion" placeholder="Profesión" value="{{old('profesion')}}">
                @error('profesion')
                    <p class="form-text text-danger">El campo 'Profesión' es obligatorio.</p>
                @enderror
                
                <!-- Años laborando -->
                <label for="laborando" class="form-label">Años laborando:</label>
                <input type="number" class="form-control" id="laborando" name="laborando" placeholder="Años laborando" value="{{old('laborando')}}">
                @error('laborando')
                    <p class="form-text text-danger">El campo 'Años laborando' es obligatorio.</p>
                @enderror

                <!-- Salario-->
                <label for="salario" class="form-label">Salario:</label>
                <input type="number" class="form-control" id="salario" name="salario" placeholder="Salario" value="{{old('salario')}}">
                @error('salario')
                    <p class="form-text text-danger">El campo 'Salario' es obligatorio.</p>
                @enderror
                
                <!-- Email -->
                <label for="email" class="form-label">Correo electrónico:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="email" value="{{old('email')}}">
                @error('email')
                    <p class="form-text text-danger">{{$message}}</p>
                @enderror

                <!-- fotografia -->
                <label for="foto" class="form-label">Fotografía (600x400):</label>
                <input type="file" class="form-control" id="foto" name="foto" placeholder="Fotografía" value="{{old('foto')}}">
                @error('foto')
                    <p class="form-text text-danger">{{$message}}</p>
                @enderror
                <div class="mt-4">
                    <img id="imagenSeleccionada" style="max-width: 600px max-height: 400px">
                </div>

                <br>
                <div class="d-grid gap-2">
                    <input type="submit" class="btn btn-outline-dark" value="Register">
                </div>

            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function (e){
        $('#foto').change(function(){
            let reader = new FileReader();
            reader.onload = (e) =>{
                $('#imagenSeleccionada').attr('src',e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    });
</script>
@endsection