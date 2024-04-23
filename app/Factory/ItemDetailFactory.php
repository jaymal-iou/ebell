<?php

declare(strict_types=1);

namespace App\Factory;

use App\Models\ItemDetailModel;

class ItemDetailFactory
{
    public function create(array $rawItems): ItemDetailModel
    {
        return new ItemDetailModel($rawItems['quantity'], $rawItems['price']);
    }
}
