<?php

namespace App\Http\Controllers;

use App\Models\CategoriaReceta;
use App\Models\Receta;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RecetaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // auth()::user()->recetas->dd();
        $recetas =  Auth::user()->recetas;
        return view('recetas.index', compact('recetas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // DB::table('categoria_receta')->get()->pluck('nombre', 'id')->dd();
        // Obtener categorias sin modelo
        // $categorias = DB::table('categoria_recetas')->get()->pluck('nombre', 'id');

        // con modelo
        $categorias = CategoriaReceta::all(['id', 'nombre']);

        return view('recetas.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request['imagen']->store('upload-recetas', 'public'));

        // Validación
        $data = request()->validate([
            'titulo' => 'required|min:6',
            'categoria' => 'required',
            'preparacion' => 'required',
            'ingredientes' => 'required',
            // 'imagen' => 'required|image|size:1000',
            'imagen' => 'required|image',

        ]);

        // Ruta de la imagen
        $ruta_imagen = $request['imagen']->store('upload-recetas', 'public');

        // Almacenar en la Bd sin modelo
        // DB::table('recetas')->insert([
        //     'titulo' => $data['titulo'],
        //     'ingredientes' => $data['ingredientes'],
        //     'preparacion' => $data['preparacion'],
        //     'imagen' => $ruta_imagen,
        //     'user_id' => Auth::user()->id,
        //     'categoria_id' => $data['categoria']
        // ]);

        // Almacenar en la Bd con modelo
        auth()->user()->recetas()->create([
            'titulo' => $data['titulo'],
            'ingredientes' => $data['ingredientes'],
            'preparacion' => $data['preparacion'],
            'imagen' => $ruta_imagen,
            'categoria_id' => $data['categoria']
        ]);

        // dd($request->all());

        // Redireccionar 
        return redirect()->action([RecetaController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function show(Receta $receta)
    {
        //
        // return $receta->all();
        return view('recetas.show', compact('receta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function edit(Receta $receta)
    {
        //
        $categorias = CategoriaReceta::all(['id', 'nombre']);

        return view('recetas.edit', compact('categorias', 'receta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receta $receta)
    {

        // Revisar el policy
        $this->authorize('update', $receta);

        // Validación
        $data = request()->validate([
            'titulo' => 'required|min:6',
            'categoria' => 'required',
            'preparacion' => 'required',
            'ingredientes' => 'required',
            // 'imagen' => 'required|image|size:1000',
        ]);

        // Asignar valores
        $receta->titulo = $data['titulo'];
        $receta->ingredientes = $data['ingredientes'];
        $receta->preparacion = $data['preparacion'];
        $receta->categoria_id = $data['categoria'];

        // Si el usuario sube una nueva imagen
        if (request('imagen')) {
            // Ruta de la imagen
            $ruta_imagen = $request['imagen']->store('upload-recetas', 'public');

            $receta->imagen = $ruta_imagen;
        }



        $receta->save();

        // return $receta;

        // Una vez guardado vamos a redireccionar
        return redirect()->action([RecetaController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receta $receta)
    {
        // Ejecutar el policy
        $this->authorize('delete', $receta);

        // Eliminar la receta;

        $receta->delete();

        return redirect()->action([RecetaController::class, 'index']);
    }
}
