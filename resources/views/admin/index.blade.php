@extends('theme.base')

@section('title', 'USER')

@section('content')
@if (Session::has('mensaje'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{Session::get('mensaje')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
    <br>

    <div class="container">
        <center><h2 class="fw-bold text-center">Usuarios</h2><br></center>

        <!--OPCIONES-->
        <div class="btn-group">
           <button type="button" class="bg-dark text-white" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-ellipsis-vertical"></i>
             </button>
             <ul class="dropdown-menu">
               <li><a class="dropdown-item" href="{{route('admin.create')}}">Crear usuario</a></li>
               <li><a class="dropdown-item" href="{{route('operator.create')}}">Crear operador</a></li>
               <li><a class="dropdown-item" href="{{route('solicitud.index')}}">ver solicitudes</a></li>  
             </ul>
       </div><br><br>
    </div>
    <div class="container">

        <table class="table text-alignment center shadow p-3 mb-5 bg-body container rounded-3">
            <thead class="table-dark">
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Profesion</th>
                <th>Fotografía</th>
                <th>Estado</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                @forelse ($usuarios as $detail)
                    <tr>
                        <td>{{$detail->name}}</td>
                        <td>{{$detail->apellido}}</td>
                        <td>{{$detail->profesion}}</td>
                        <td><img src="{{asset('storage').'/'.$detail->foto}}" width="50px"></td>

                        <!--Estado-->
                        @if (@$detail->solicitud == 'pendiente')
                            <td><span class="badge bg-warning">{{$detail->solicitud}}</span></td>
                        @endif

                        @if (@$detail->solicitud == 'aceptado')
                            <td><span class="badge bg-success">{{$detail->solicitud}}</span></td>
                        @endif

                        @if (@$detail->solicitud == 'rechazado')
                            <td><span class="badge bg-danger">{{$detail->solicitud}}</span></td>
                        @endif

                        <td>
                            <a href="{{route('admin.ver',$detail)}}" class="btn btn-primary fa-solid fa-eye"></a>
                            <a href="{{route('admin.edit',$detail)}}" class="text-white btn btn-warning fa-solid fa-pen-to-square"></a>

                            <form action="{{ route('admin.destroy', $detail) }}" method="POST" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger" type="submit" onclick="return confirm('¿Esta seguro de eliminar este registro?')"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <td class="text-center" colspan="6">No hay registros.</td>
                @endforelse           
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            @if ($usuarios->count())
                {{$usuarios->links()}}
            @endif
        </div>  
    </div>
@endsection