@extends('layouts.profesores')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2 class="text-white">Estudiantes</h2>
        </div>
        <div>
            <a href="{{route('estudiantes.create')}}" class="btn btn-primary">Crear nuevo Estudiante</a>
        </div>
    </div>

    @if(Session::get('success'))
        <div class="alert alert-success mt-3">
            <strong>{{Session::get('success')}}<br>
        </div>
    @endif

    <div class="col-12 mt-4">
        <table class="table table-bordered text-white">
            <tr class="text-secondary">
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>
                <th>Fecha de Nacimiento</th>
                <th>Acción</th>
            </tr>
            @foreach ($estudiantes as $estudiante)
            <tr>
                <td class="fw-bold">{{$estudiante->nombre}}</td>
                <td>{{$estudiante->apellido}}</td>
                <td>
                    {{$estudiante->correo}}
                </td>
                <td>
                    {{$estudiante->fecha_nacimiento}}
                </td>
                <td>
                    <a href="{{route('estudiantes.edit',$estudiante->id)}}" class="btn btn-warning">Editar</a>

                    <form action="{{route('estudiantes.destroy',$estudiante)}}" method="post" class="d-inline">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        {{$estudiantes->links()}}
    </div>
</div>
@endsection