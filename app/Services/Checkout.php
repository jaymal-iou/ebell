<?php

declare(strict_types=1);

namespace App\Services;

use App\Services\PriceRuleStrategy;

class Checkout
{
    private PriceRuleStrategy $priceRuleStrategy;
    private array $items = [];

    public function __construct(PriceRuleStrategy $priceRuleStrategy)
    {
        $this->priceRuleStrategy = $priceRuleStrategy;
    }

    public function addItem($item): void
    {
        $this->items[] = $item;
    }

    public function total(): int
    {
        return $this->priceRuleStrategy->getPrice($this->items);
    }
}
