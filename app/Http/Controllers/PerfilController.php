<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth', ['except' => 'show']);
    }


    public function show(Perfil $perfil)
    {
        //
        return view('perfiles.show', compact('perfil'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function edit(Perfil $perfil)
    {
        //
        $this->authorize('view', $perfil);


        return view('perfiles.edit', compact('perfil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perfil $perfil)
    {
        // Ejecutar el policy
        $this->authorize('update', $perfil);

        // Validar
        $data = request()->validate([
            'nombre' => 'required',
            'url' => 'required',
            'biografia' => 'required',
        ]);

        // Si el usuario sube una imagen
        if ($request['imagen']) {
            $ruta_imagen = $request['imagen']->store('upload-perfiles', 'public');

            // Crear un arreglo de imagen
            $array_imagen = ['imagen' => $ruta_imagen];
        }


        // Aignar nombre y URL
        auth()->user()->url = $data['url'];
        auth()->user()->name = $data['nombre'];

        // $perfil->save();
        auth()->user()->save();


        // Eliminar url y name de $data
        unset($data['url']);
        unset($data['nombre']);


        // return $data;
        // Asignar Biografía e imagen


        // Guardar información
        auth()->user()->perfil()->update(
            array_merge(
                $data,
                $array_imagen ?? []
            )
        );

        // Redireccionar

        return redirect(action([RecetaController::class, 'index']));
    }
}
