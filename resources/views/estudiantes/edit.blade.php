@extends('layouts.profesores')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2>Ediatar Estudiante</h2>
        </div>
        <div>
            <a href="{{route('estudiantes.index')}}" class="btn btn-primary">Volver</a>
        </div>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger mt-3">
            <strong>Por las chancas de mi madre!</strong> Algo fue mal..<br><br>
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('estudiantes.update',$estudiante)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Nombre:</strong>
                    <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="{{$estudiante->nombre}}" >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Apellido:</strong>
                    <input type="text" name="apellido" class="form-control" placeholder="Apellido" value="{{$estudiante->apellido}}" >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Correo:</strong>
                    <input type="email" name="correo" class="form-control" placeholder="Correo Electronico" value="{{$estudiante->correo}}" >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Fecha de Nacimiento</strong>
                    <input type="date" name="fecha_nacimiento" class="form-control" id="" value="{{$estudiante->fecha_nacimiento}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </div>
    </form>
</div>
@endsection