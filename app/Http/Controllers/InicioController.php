<?php

namespace App\Http\Controllers;

use App\Models\Receta;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CategoriaReceta;

class InicioController extends Controller
{
    //
    public function index()
    {

        // Mostrar recetas por catidad de votos
        // $votadas = Receta::has('likes', '>', 0)->get();
        $votadas = Receta::withCount('likes')->orderBy('likes_count', 'desc')->take(3)->get();
        // return $votadas;


        // Obtener las recetas más nuevas
        // $nuevas = Receta::orderBy('created_at', 'ASC')->get();
        // latest() y oldest()
        $nuevas = Receta::latest()->take(6)->get();

        // Obtener todas las categorias
        $categorias = CategoriaReceta::all();

        // Agrupar las recetas pr categoría
        $recetas = [];

        foreach ($categorias as $categoria) {
            # code...
            $recetas[Str::slug($categoria->nombre)][] = Receta::where('categoria_id', $categoria->id)->take(3)->get();
        }

        // return $recetas;
        // Recetas por categoría
        // $mexicana = Receta::where('categoria_id');

        return view('inicio.index', compact('nuevas', 'recetas', 'votadas'));
    }
}
