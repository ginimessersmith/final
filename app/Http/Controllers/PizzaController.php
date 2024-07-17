<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use App\Models\Visit;
use App\Models\Categoria;
use App\Models\DetallePedido;
use App\Models\Pedido;
use App\Models\Tamano;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PizzaController extends Controller
{
    // Otros métodos...
    public function index(Request $request)
    {
        $termino = $request->input('termino');
        $categoria = $request->input('categoria');
        $tamano = $request->input('tamano');

        $pizzas = Pizza::when($termino, function($query) use ($termino) {
            $query->where('nombre', 'LIKE', '%'.Str::upper($termino).'%')
                  ->orWhere('descripcion', 'LIKE', '%'.Str::upper($termino).'%');
        })->when($categoria, function($query) use ($categoria) {
            $query->where('categoria_id', '=', $categoria);
        })->when($tamano, function($query) use ($tamano) {
            $query->where('tamano_id', '=', $tamano);
        })
        ->paginate(10);

        $visits = Visit::where(['page_name' => 'pizzas.index'])->first();
        $categorias = Categoria::all(); // Agrega esto
        $tamanos = Tamano::all(); // Agrega esto

        return view('pizza.index', [
            'pizzas' => $pizzas,
            'visits' => $visits,
            'categorias' => $categorias, // Asegúrate de pasar esto a la vista
            'tamanos' => $tamanos // Asegúrate de pasar esto a la vista
        ]);
    }

    public function create()
    {
        $categorias = Categoria::all();
        $tamanos = Tamano::all();
        return view('pizza.create', compact('categorias', 'tamanos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric',
            'categoria_id' => 'required',
            'tamano_id' => 'required',
            'foto' => 'required|image|max:2048',
            'descripcion' => 'required'
        ]);

        $imagen_url = Cloudinary::upload($request->file('foto')->getRealPath())->getSecurePath();

        Pizza::create([
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'categoria_id' => $request->categoria_id,
            'tamano_id' => $request->tamano_id,
            'imagen_url' => $imagen_url,
            'descripcion' => $request->descripcion
        ]);

        return redirect()->route('pizzas.index')->with('success', 'Pizza creada correctamente');
    }

    public function edit($id)
    {
        $pizza = Pizza::find($id);
        $categorias = Categoria::all();
        $tamanos = Tamano::all();
        return view('pizza.edit', compact('pizza', 'categorias', 'tamanos'));
    }
    public function show(string $id)
    {
        $pizza = Pizza::find($id);
        return view('pizza.show', compact('pizza'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric',
            'categoria_id' => 'required',
            'tamano_id' => 'required',
            'descripcion' => 'required',
            'foto' => 'nullable|image|max:2048'
        ]);

        $pizza = Pizza::find($id);

        if($request->hasFile('foto')) {
            $imagen_url = Cloudinary::upload($request->file('foto')->getRealPath())->getSecurePath();
            $pizza->imagen_url = $imagen_url;
        }

        $pizza->update([
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'categoria_id' => $request->categoria_id,
            'tamano_id' => $request->tamano_id,
            'descripcion' => $request->descripcion
        ]);

        return redirect()->route('pizzas.index')->with('success', 'Pizza editada correctamente');
    }

    public function destroy($id)
    {
        Pizza::destroy($id);
        return redirect()->route('pizzas.index')->with('success', 'Pizza eliminada exitosamente');
    }

    public function addToCart(Request $request, $id)
    {
        $pizza = Pizza::find($id);
        $cantidad = $request->input('cantidad', 1);

        // if(auth()->user()->id_cajero){

        //     $pedido = Pedido::create([
        //         'cliente_id' => auth()->user()->cliente->id,
        //         'estado_id' => 1,
        //         'nombre'=>'',
        //         'total' => 0,
        //         'metodo_pago_id' => 4,
        //         'pago_estados_id' => 1,
        //     ]);
        // }

        if(auth()->user()->cliente->hasCarrito()){
            $pedido = auth()->user()->cliente->hasCarrito();
        } else {
            $pedido = Pedido::create([
                'cliente_id' => auth()->user()->cliente->id,
                'estado_id' => 1,
                'total' => 0,
                'metodo_pago_id' => 4,
                'pago_estados_id' => 1,
            ]);
        }

        $detalle = DetallePedido::create([
            'pedido_id' => $pedido->id,
            'pizza_id' => $pizza->id,
            'cantidad' => $cantidad,
            'subtotal' => $pizza->precio * $cantidad
        ]);

        $pedido->total = $pedido->total + $detalle->subtotal;
        $pedido->save();

        return redirect()->route('pizzas.index')->with('success', 'Pizza agregada al carrito');
    }
}
