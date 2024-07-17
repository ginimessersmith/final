<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Visit;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index(){
        // $visits = Visit::where(['page_name' => 'pedidos.index'])->first();
        // return view('pedidos.index', compact('visits'));

        $pedidos = Pedido::where('estado_id', 2)->get();
        return view('pedidos.index', compact('pedidos'));
    }

    public function myOrders()
    {
        $cliente_id = auth()->user()->cliente->id;
        $pedidos = Pedido::where('cliente_id', $cliente_id)->get();
        return view('pedidos.pedido_cliente', compact('pedidos'));
    }

    public function callback(){


    }

    public function history()
    {
        $pedidos = auth()->user()->cliente->pedidos;
        $visits = Visit::where('page_name', 'pedidos.index')->first(); // Asumiendo que estás rastreando visitas

        return view('pedidos.index', compact('pedidos', 'visits'));
    }

    public function markAsSent($id)
    {
        $pedido = Pedido::find($id);
        // dd($pedido->estado_id);
        $pedido->estado_id = 3;
        $pedido->save();

        return redirect()->route('pedidos.index')->with('alert', 'El pedido se ha enviado correctamente');
    }

}
