<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\DetallePedido;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class DetallePedidoController extends Controller
{
    public function index()
    {
        $detalles = [];
        $total = 0;
        $pedido = null;

        if (auth()->user()->cliente) {
            $pedido = Pedido::where('cliente_id', auth()->user()->cliente->id)
                ->where('estado_id', 1)
                ->first();
        }

        if ($pedido) {
            $detalles = DetallePedido::where('pedido_id', $pedido->id)->get();
            $total = $detalles->sum('subtotal');
        } else {
            $pedido = Pedido::where('users_id', auth()->user()->id)
                ->where('estado_id', 1)
                ->latest()
                ->first();
            // dd($pedido);
            if ($pedido) {
                $detalles = DetallePedido::where('pedido_id', $pedido->id)->get();
                $total = $detalles->sum('subtotal');
            }
        }

        // dd(['detalles' => $detalles, 'pedido' => $pedido]);

        return view('detalle_pedido.index', [
            'detalles' => $detalles,
            'total' => $total,
            'pedido' => $pedido,
        ]);
    }


    public function delete($id)
    {
        $detalle = DetallePedido::find($id);
        $pedido = Pedido::find($detalle->pedido->id);
        $pedido->total = $pedido->total - $detalle->subtotal;

        $detalle->delete();

        if ($pedido->total == 0) {
            $pedido->delete();
        } else {
            $pedido->save();
        }

        return redirect()->route('detalle_pedido.index')->with('success', 'Producto eliminado del carrito');
    }

    public function checkout(Request $request)
    {
        $pedido = Pedido::find($request->pedido_id);

        $pedido->estado_id = 2;
        $pedido->save();

        $tcCommerceID = env('PAGOFACIL_COMMERCEID');
        $tcTokenServicio = env('PAGOFACIL_TOKENSERVICE');
        $tcTokenSecret = env('PAGOFACIL_TOKENSECRET');
        $tcUrlCallBack = env('PAGOFACIL_URLCALLBACK');
        $tcUrlReturn = env('PAGOFACIL_URLRETURN');

        $url = "https://serviciostigomoney.pagofacil.com.bo/api/servicio/generarqrv2";

        $dataHeader = [
            "Accept" => "application/json"
        ];

        $taPedidoDetalle = [
            "serial" => $pedido->id,
            "producto" => "Pedido " . $pedido->id,
            "cantidad" => 1,
            "precio" => $pedido->total,
            "descuento" => 0,
            "total" => $pedido->total,
        ];

        $dataBody = [
            "tcTokenServicio"       => $tcTokenServicio,
            "tcTokenSecret"         => $tcTokenSecret,
            "tcCommerceID"          => $tcCommerceID,
            "tnMoneda"              => 2,
            "tnTelefono"            => $pedido->cliente->numeroTelf ?? '00000000', // Valor por defecto si es null
            "tcNombreUsuario"       => $pedido->cliente->user->name ?? $pedido->nombre, // Valor por defecto si es null
            "tnCiNit"               => $pedido->cliente->ci_nit ?? '00000000', // Valor por defecto si es null
            "tcNroPago"             => "pago " . rand(1000, 9999),
            "tnMontoClienteEmpresa" => $pedido->total ?? 0, // Valor por defecto si es null
            "tcCorreo"              => $pedido->cliente->user->email ?? 'correo@desconocido.com', // Valor por defecto si es null
            "tcUrlCallBack"         => $tcUrlCallBack,
            "tcUrlReturn"           => $tcUrlReturn,
            "taPedidoDetalle"       => $taPedidoDetalle
        ];

        $clienteHTTP = new Client();
        $response = $clienteHTTP->request('POST', $url, [
            'headers' => $dataHeader,
            'json' => $dataBody
        ]);

        $decodedJSON = json_decode($response->getBody());
        $values = explode(";", $decodedJSON->values)[1];
        $QR = "data:image/png;base64," . json_decode($values)->qrImage;

        $pedido->pago_estados_id = 2;
        $pedido->save();

        return view('detalle_pedido.index', [
            'detalles' => DetallePedido::where('pedido_id', $pedido->id)->get(),
            'total' => $pedido->total,
            'pedido' => $pedido,
            'QR' => $QR,
        ]);
    }
}
