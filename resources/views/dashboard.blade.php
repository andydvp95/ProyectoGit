@extends('layouts.app')


@section('content')

    @include('widgets.navbar')

    <main role="main" class="flex-shrink-0">
        <div class="container">
            <h1 class="mt-5">Hola cabron</h1>
            @if (!empty($where) )
                @foreach ($where as $w)
                    <p> {{$w->nombre}} - {{ $w->correo}} </p>
                    <p> {{$w->numero}} </p>
                    <p> {{$w->aleatorio}} </p>
                    <p> {{$w->imagen}} </p>
                @endforeach
            @endif
        </div>
    </main>

    @include('widgets.footer')
@endsection
