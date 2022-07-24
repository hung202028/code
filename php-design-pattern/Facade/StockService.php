<?php

namespace Facade;

class StockService
{
    public function checkOutOfStock(array $itemSKUs): bool
    {
        $message = sprintf("Checkout SKUs available, count: %s\n", count($itemSKUs));
        echo $message;

        return true;
    }
}
