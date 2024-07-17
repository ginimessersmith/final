<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pizza;
use App\Models\Tamano;
use App\Models\Categoria;
use App\Models\Estado;
use App\Models\MetodoPago;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('search');
        $query = Str::lower($query);

        $users = User::whereRaw('LOWER(name) LIKE ?', ['%' . $query . '%'])->paginate(4);
        $pizzas = Pizza::whereRaw('LOWER(nombre) LIKE ?', ['%' . $query . '%'])
                       ->orWhereRaw('LOWER(descripcion) LIKE ?', ['%' . $query . '%'])
                       ->paginate(4);

        $categorias = Categoria::whereRaw('LOWER(nombre) LIKE ?', ['%' . $query . '%'])->paginate(4);
        $tamanos = Tamano::whereRaw('LOWER(nombre) LIKE ?', ['%' . $query . '%'])->paginate(4);
        $metodopagos = MetodoPago::whereRaw('LOWER(nombre) LIKE ?', ['%' . $query . '%'])->paginate(4);
        $estados = Estado::whereRaw('LOWER(nombre) LIKE ?', ['%' . $query . '%'])->paginate(4);

        return view('search.index', compact('users', 'pizzas', 'categorias', 'tamanos', 'metodopagos', 'estados'));
    }
    public function find(Request $request)
    {

        $search = $request->input('search');
        $search = Str::lower($search);

        $results = Pizza::whereRaw('LOWER(nombre) LIKE ?', ["%{$search}%"])
            ->orWhereRaw('LOWER(descripcion) LIKE ?', ["%{$search}%"])
            ->get();
        return view('search.results', compact('results'));
    }
}
