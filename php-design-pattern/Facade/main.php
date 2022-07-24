<?php

require_once '../autoload.php';

use Facade\CheckoutService;

$payload = [
    'email' => 'test-1@example.com',
    'items' => [
        'sku' => 'ABCD1',
        'name' => 'item1'
    ],
];

$checkout = new CheckoutService();
$url = $checkout->checkout($payload);
echo $url;
