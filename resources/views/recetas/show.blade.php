@extends('layouts.app')

@section('content')
    {{-- <h1>{{$receta}}</h1> --}}
    <article class="contenido-receta">
        
        <h1 class="text-center mb-4">{{$receta->titulo}}</h1>

        <div class="imagen-receta container">
            <img src="/storage/{{$receta->imagen}}" class = "w-100" alt="">
        </div>

        <div class="receta-meta container mt-2">
            
            <p>
                <span class="font-weight-bold text-primary">Escrito en:</span>
                {{$receta->categoria->nombre}}
            </p>

            <p>
                <span class="font-weight-bold text-primary">Autor:</span>
                {{-- TODO: Mostrar el usuario --}}
                {{$receta->autor->name}}
            </p>

            <p>
                <span class="font-weight-bold text-primary">Fecha:</span>
                {{-- TODO: Mostrar el usuario --}}

                @php
                    $fecha = $receta->created_at;    

                @endphp
                <fecha-receta fecha= "{{$fecha}}"></fecha-receta>
            </p>

            <div class="ingredientes">
                <h2 class="my-3 text-primary">Ingredientes</h2>
                {!!$receta->ingredientes!!}
            </div>

            <div class="preparacion">
                <h2 class="my-3 text-primary">Preparación</h2>
                {!!$receta->preparacion!!}
            </div>

        </div>
    </article>


{{-- <example-component/> --}}

@endsection