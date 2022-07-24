<?php

namespace Facade;

class Order
{
    public function __construct(
        private string $orderNr = '',
        private string $customerEmail = '',
        private array  $orderItems = [],
    )
    {
    }

    /**
     * @return string
     */
    public function getOrderNr(): string
    {
        return $this->orderNr;
    }

    /**
     * @param string $orderNr
     */
    public function setOrderNr(string $orderNr): void
    {
        $this->orderNr = $orderNr;
    }

    /**
     * @return string
     */
    public function getCustomerEmail(): string
    {
        return $this->customerEmail;
    }

    /**
     * @param string $customerEmail
     */
    public function setCustomerEmail(string $customerEmail): void
    {
        $this->customerEmail = $customerEmail;
    }

    /**
     * @return array
     */
    public function getOrderItems(): array
    {
        return $this->orderItems;
    }

    /**
     * @param array $orderItems
     */
    public function setOrderItems(array $orderItems): void
    {
        $this->orderItems = $orderItems;
    }
}
