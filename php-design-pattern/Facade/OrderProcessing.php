<?php

namespace Facade;

use Facade\Order;

class OrderProcessing
{
    private function generateOrderNr(): string
    {
        return date('YmdHis');
    }

    public function createOrder(array $data): Order
    {
        return new Order(
            $this->generateOrderNr(),
            $data['email'] ?? '',
            $data['items'] ?? [],
        );
    }

    public function storeOrder(Order $order): int
    {
        $message = sprintf("Storing order %s to database\n", $order->getOrderNr());
        echo $message;

        return random_int(1, 100000); // return order id
    }
}
