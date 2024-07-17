<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallePedidoCajero extends Model
{
    use HasFactory;

    protected $fillable = [
        'pedidos_cajeros_id',
        'pizza_id',
        'cantidad',
        'subtotal'
    ];

    public function pedidos_cajeros(){
        return $this->belongsTo(PedidoCajero::class);
    }

    public function pizza(){
        return $this->belongsTo(Pizza::class);
    }

}
