<?php

declare(strict_types=1);

namespace App\Services;

interface PriceRuleStrategy
{
    public function getPrice(array $items): int;
}
