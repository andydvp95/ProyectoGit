@extends('layouts.app')


@section('content')

    @include('widgets.navbar')

    <main role="main" class="flex-shrink-0">
        <div class="container">
            <h1 class="mt-5">Mis tareas</h1>
            <a href="{{route('tareas.index')}}">Regresar</a>
            <section class="content">
                <h3>Crear Tareas</h3>
                @include('tareas._form')
            </section>
        </div>
    </main>

@endsection
