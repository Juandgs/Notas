<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Estudiantes') }}
        </h2>
    </x-slot>

    <div class="row">
        <div class="col-12">
            <div>
                <a href="{{route('estudiantes.create')}}" class="mt-3 ms-2 btn btn-primary">Crear nuevo Estudiante</a>
            </div>
        </div>

        @if(Session::get('success'))
            <div class="alert alert-success mt-3">
                <strong>{{Session::get('success')}}<br>
            </div>
        @endif

        <div class="col-12 mt-3">
            <table class="table table-bordered text-black">
                <tr class="">
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Acción</th>
                </tr>
                @foreach ($estudiantes as $estudiante)
                <tr>
                    <td>{{$estudiante->nombre}}</td>
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
</x-app-layout>