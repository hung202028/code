<?php

namespace Facade;

use Facade\Order;

class PaymentProcessing
{
    // Returning a redirectURL to the payment page
    public function capture(Order $order): string
    {
        $message = sprintf("Capturing payment for order: %s\n", $order->getOrderNr());
        echo $message;

        return "http://google.com.vn";
    }
}
