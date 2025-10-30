<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Checkout - Mercado Pago</title>
</head>
<body>
<h1>Comprar un hermoso {{ $preference->items[0]->title }}</h1>
<p>Precio: ${{ number_format($preference->items[0]->unit_price, 0, ',', '.') }}</p>

<div id="wallet_container"></div>

<script src="https://sdk.mercadopago.com/js/v2"></script>
<script>
    const mp = new MercadoPago("{{ env('MERCADO_PAGO_PUBLIC_KEY') }}", {
        locale: 'es-CO'
    });

    mp.bricks().create("wallet", "wallet_container", {
        initialization: {
            preferenceId: "{{ $preference->id }}",
        },
    });
</script>
</body>
</html>
