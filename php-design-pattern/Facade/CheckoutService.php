<?php

namespace Facade;

class CheckoutService // Facade
{
    private PaymentProcessing $paymentService;
    private OrderProcessing $orderService;
    private StockService $stockService;

    public function __construct()
    {
        $this->paymentService = new PaymentProcessing();
        $this->orderService = new OrderProcessing();
        $this->stockService = new StockService();
    }

    public function checkout(array $orderPayload): string|false
    {
        $items = $orderPayload['items'] ?? [];
        $skuList = array_map(function ($elem) { return $elem['sku'] ?? ''; }, $items);
        if (!$this->stockService->checkOutOfStock($skuList)) {
            return false;
        }

        $order = $this->orderService->createOrder($orderPayload);
        $this->orderService->storeOrder($order);
        $url = $this->paymentService->capture($order);
        return $url;
    }
}
