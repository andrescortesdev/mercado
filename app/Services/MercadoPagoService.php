<?php

namespace App\Services;

use MercadoPago\Client\Preference\PreferenceClient;

class MercadoPagoService
{
    public function __construct()
    {
        \MercadoPago\MercadoPagoConfig::setAccessToken(config('services.mercadopago.token'));
    }

    public function crearPreferencia($titulo, $precio, $cantidad = 1)
    {
        try {
            \MercadoPago\MercadoPagoConfig::setAccessToken(config('services.mercadopago.token'));

            $client = new \MercadoPago\Client\Preference\PreferenceClient();
            $preference = $client->create([
                "items" => [
                    [
                        "title" => $titulo,
                        "quantity" => $cantidad,
                        "unit_price" => $precio
                    ]
                ],
                "back_urls" => [
                    "success" => 'https://tom-metempirical-kasen.ngrok-free.dev/pago/success',
                    "failure" => 'https://tom-metempirical-kasen.ngrok-free.dev/pago/failure',
                    "pending" => 'https://tom-metempirical-kasen.ngrok-free.dev/pago/pending',
                ],
                "auto_return" => "approved"
            ]);

            return $preference;
        } catch (\MercadoPago\Exceptions\MPApiException $e) {
            dd([
                'status' => $e->getApiResponse()->getStatusCode(),
                'body' => $e->getApiResponse()->getContent()
            ]);
        }
    }

}
