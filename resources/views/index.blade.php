@extends('layouts.base')
@section('content')
<!-- <link rel="stylesheet" href="../../public/css/me.css"> -->
<style>
    .hidden {
        display: none;
    }
</style>
<div class="row">
    <div class="col-12">
        <div>
            <h2 class="text-white">CRUD de Tareas</h2>
        </div>
        <div>
            <a href="{{route('tasks.create')}}" class="btn btn-primary">Crear tarea</a>
        </div>
    </div>

    <style>
        .alertas {
            width: 300px;
        }
    </style>
    <div class="d-flex justify-content-center">

        @if (Session::get('success'))
        <div class="alert alert-success alertas" id="crear">
            <strong>La Tarea se creo correctamente!</strong>
        </div>
        @endif

        @if (Session::get('ok'))
        <div class="alert alert-success alertas" id="eliminar">
            <strong>Se elimino correctamente!</strong>
        </div>
        @endif

        @if (Session::get('edit'))
        <div class="alert alert-success alertas" id="editar">
            <strong>Se actualizo correctamente!</strong>
        </div>
        @endif
    </div>

    <div class="col-12 mt-4">
        <table class="table table-bordered text-white">
            <tr class="text-secondary">
                <th>Tarea</th>
                <th>Descripción</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>Acción</th>
            </tr>

            @foreach ($tasks as $task)

            <tr>
                <td class="fw-bold">{{$task->title}}</td>
                <td>{{$task->description}}</td>
                <td>
                    {{$task->due_date}}
                </td>
                <td>
                    <span class="badge bg-warning fs-6">{{$task->status}}</span>
                </td>
                <td>
                    <a href="{{route('tasks.edit', $task->id)}}" class="btn btn-warning">
                        Editar
                    </a>

                    <form action="{{route('tasks.destroy', $task)}}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" id="btnEliminar" class="btn btn-danger">Eliminar</button>

                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        {{$tasks->links()}}
    </div>
    <script src="{{ asset('js/me.js') }}"></script>
    <!-- 
    <script>
        const btnEliminar = document.getElementById("btnEliminar");
        btnEliminar.addEventListener("click", (event) => {
            if (!confirm("¿Quiere eliminar la tarea?")) {
                event.preventDefault(); // Evita que el formulario se envíe si el usuario hace clic en "Cancelar"
            }
        });
    </script> -->
</div>

@endsection