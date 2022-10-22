@extends('theme.base')

@section('title', 'SOLICITUDES')

@section('content')
@if (Session::has('mensaje'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{Session::get('mensaje')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
    <br>
    <div class="container text-center">
        <h2 class="fw-bold text-center">Solicitudes</h2>

        <table class="table text-alignment center shadow p-3 mb-5 bg-body container rounded-3">
            <thead class="table-dark">
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Profesión</th>
                <th>Fotografía</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                @forelse ($usuarios as $detail)
                    <tr>
                        <td>{{$detail->name}}</td>
                        <td>{{$detail->apellido}}</td>
                        <td>{{$detail->email}}</td>
                        <td>{{$detail->profesion}}</td>
                        <td><img src="{{asset('storage').'/'.$detail->foto}}" width="50px"></td>
                        <td>
                            <a href="{{route('solicitud.edit',$detail)}}" class="btn btn-primary fa-solid fa-eye"></a>
                        </td>
                    </tr>
                @empty
                    <td colspan="6">No hay solicitudes pendientes.</td>
                @endforelse
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            @if ($usuarios->count())
                {{$usuarios->links()}}
            @endif
        </div>  
    </div>
    <div class="container">
        <a href="{{route('admin.index')}}" class="btn btn-danger"><i class="fa-solid fa-chevron-left"></i></a>
    </div>
@endsection