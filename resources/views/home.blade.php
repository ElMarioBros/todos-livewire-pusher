@extends('layout.includes')

@section('content')
    <h2>
        Todos.
    </h2>

    <p>
        Comienza a agregar tareas.
    </p>

    <livewire:add-todo/>

    <livewire:todos-list/>
@endsection