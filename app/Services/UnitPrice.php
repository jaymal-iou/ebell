<?php

declare(strict_types=1);

namespace App\Services;

use App\Services\PriceRuleStrategy;

class UnitPrice implements PriceRuleStrategy
{
    public function getPrice(array $items): int
    {
        $defaultPrices = $this->getDefaultPrices();
        $total = 0;
        foreach ($items as $item) {

            $defaultPrice = $defaultPrices[$item] ?? null;

            $total += $defaultPrice;
        }

        return $total;
    }

    private function getDefaultPrices(): array
    {
        //this is a hardcoded array, but in real life this should be fetched from a database
        return [
            'A' => 50,
            'B' => 30,
            'C' => 20,
            'D' => 15
        ];
    }
}
