@extends('layouts.app')

@section('content')

    {{-- <h1>{{$receta}}</h1> --}}
    <article class="contenido-receta bg-white p-5 shadow">
        
        <h1 class="text-center mb-4">{{$receta->titulo}}</h1>

        <div class="imagen-receta container">
            <img src="/storage/{{$receta->imagen}}" class = "w-100" alt="">
        </div>

        <div class="receta-meta container mt-5">
            
            <p>
                <span class="font-weight-bold text-primary">Escrito en:</span>
                <a class="text-dark" href="{{route('categorias.show', ['categoriaReceta' => $receta->categoria->id])}}">
                    {{$receta->categoria->nombre}}
                </a>
            </p>

            <p>
                <span class="font-weight-bold text-primary">Autor:</span>
                {{-- TODO: Mostrar el usuario --}}

                <a class="text-dark" href="{{route('perfiles.show', ['perfil' => $receta->autor->id])}}">
                    {{$receta->autor->name}}
                </a>

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

            {{-- {{$likes}} --}}

            <div class="d-flex justify-content-center mt-2">
                <like-button
                receta-id = '{{$receta->id}}'
                like = '{{$like}}'
                likes = '{{$likes}}'
                ></like-button>
            </div>
            

        </div>
    </article>


{{-- <example-component/> --}}

@endsection