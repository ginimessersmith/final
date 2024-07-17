<?php

namespace App\Http\Controllers;

use App\Models\PedidoCajero;
use App\Models\Visit;
use Illuminate\Http\Request;

class PedidoCajeroController extends Controller
{
    //
    public function index(){
        // $visits = Visit::where(['page_name' => 'pedidos.index'])->first();
        // return view('pedidos.index', compact('visits'));

        $pedidos = PedidoCajero::where('estado_id', 2)->get();
        return view('cajero.view', compact('pedidos'));
    }

    public function myOrders()
    {
        $cliente_id = auth()->user()->id;
        $pedidos = PedidoCajero::where('users_id', $cliente_id)->get();
        return view('pedidos.pedido_cajero', compact('pedidos'));
    }

    public function callback(){


    }

    public function history()
    {
        $pedidos = auth()->user()->pedidos_cajeros;
        $visits = Visit::where('page_name', 'pedidos.index')->first(); // Asumiendo que estás rastreando visitas

        return view('pedidos.index_cajero', compact('pedidos', 'visits'));
    }

    public function markAsSent($id)
    {
        $pedido = PedidoCajero::find($id);
        $pedido->estado_id = 3;
        $pedido->save();

        return redirect()->route('cajero.index')->with('alert', 'El pedido se ha enviado correctamente');
    }
}
