<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profesores') }}
        </h2>
    </x-slot>

    <div class="row">
        <div class="col-12">
            <div>
                <a href="{{route('profesores.create')}}" class="mt-3 ms-2 btn btn-primary">Crear nuevo Profesor</a>
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
                    <th>Acciones</th>
                </tr>
                @foreach ($profesores as $profesor)
                <tr>
                    <td>{{$profesor->nombre}}</td>
                    <td>{{$profesor->apellido}}</td>
                    <td>
                        {{$profesor->correo}}
                    </td>
                    <td>
                        <a href="{{route('profesores.edit',$profesor->id)}}" class="btn btn-warning">Editar</a>

                        <form action="{{route('profesores.destroy',$profesor->id)}}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
            {{$profesores->links()}}
        </div>
    </div>
</x-app-layout>