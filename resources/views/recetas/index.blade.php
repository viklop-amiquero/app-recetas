@extends('layouts.app')

@section('content')

    <h2 class="text-center mb-5">Administra tus recetas</h2>
    <div class="col-md-10 mx-auto bg-white p-3">
        <table class="table">
            <thead class="bg-primary text-light">
                <tr>
                    <th scole="col">Título</th>
                    <th scole="col">Categoría</th> 
                    <th scole="col">Acciones</th> 
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>Pizza</td>
                    <td>Pizzas</td>
                    <td>
                        {{-- hola mundo --}}
                    </td>
                </tr>
            </tbody>

        </table>
    </div>
{{-- <example-component/> --}}

@endsection
