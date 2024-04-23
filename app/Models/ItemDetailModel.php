<?php

namespace App\Models;

class ItemDetailModel
{
    public function __construct(private int $quantity, private int $price)
    {
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function getPrice(): int
    {
        return $this->price;
    }
}
