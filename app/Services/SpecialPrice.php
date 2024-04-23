<?php

declare(strict_types=1);

namespace App\Services;

use App\Factory\ItemDetailFactory;
use App\Services\PriceRuleStrategy;

class SpecialPrice implements PriceRuleStrategy
{
    public function __construct(private ItemDetailFactory $itemDetailFactory)
    {
    }

    public function getPrice(array $items): int
    {
        $specialPrices = $this->getSpecialPrice();
        $defaultPrices = $this->getDefaultPrices();
        $total = 0;
        $trackedItems = [];
        foreach ($items as $item) {

            $specialItemDetail = isset($specialPrices[$item]) ? $this->itemDetailFactory->create($specialPrices[$item]) : 0;

            if ($specialItemDetail) {

                if (in_array($item, $trackedItems)) {
                    continue;
                }

                //check how many of this item in the cart
                $itemCount = array_count_values($items)[$item];

                // check the quantity eligible for special price
                $specialPriceQuantity = $specialItemDetail->getQuantity();

                if ($itemCount === $specialPriceQuantity) {
                    $trackedItems[] = $item;
                    $total += $specialItemDetail->getPrice();
                    continue;
                }
            }

            $defaultItemDetail = $defaultPrices[$item] ? $this->itemDetailFactory->create($defaultPrices[$item]) : 0;

            $total += $defaultItemDetail->getPrice();
        }

        return $total;
    }

    private function getSpecialPrice(): array
    {
        //this is a hardcoded array, but in real life this should be fetched from a database
        return [
            'A' => [
                'quantity' => 3,
                'price' => 130
            ],
            'B' => [
                'quantity' => 2,
                'price' => 45
            ]
        ];


    }

    private function getDefaultPrices(): array
    {
        //this is a hardcoded array, but in real life this should be fetched from a database
        return [
            'A' => [
                'quantity' => 1,
                'price' => 50
            ],
            'B' => [
                'quantity' => 1,
                'price' => 30
            ],
            'C' => [
                'quantity' => 1,
                'price' => 20
            ],
            'D' => [
                'quantity' => 1,
                'price' => 15
            ],
        ];
    }
}
