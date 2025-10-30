<?php

namespace App\Http\Controllers;

use App\Services\MercadoPagoService;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    public function crear()
    {
        $mercadoPago = new MercadoPagoService();
        $preference = $mercadoPago->crearPreferencia("Curso de laravelsaso", 5000);

        return view('pagos.checkout', ['preference' => $preference]);
    }

    public function success(Request $request)
    {
        return "Pago aprobado ✅ ID: " . $request->get('payment_id');
    }

    public function failure(Request $request)
    {
        return "Pago fallido ❌";
    }

    public function pending(Request $request)
    {
        return "Pago pendiente ⏳";
    }
}
