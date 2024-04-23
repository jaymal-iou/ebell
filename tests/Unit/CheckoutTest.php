<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

use App\Services\Checkout;
use App\Services\UnitPrice;
use App\Services\SpecialPrice;
use App\Factory\ItemDetailFactory;


class CheckoutTest extends TestCase
{
    public function testCanGetTotalForUnitPriceItems(): void
    {
        $unitPrice = new UnitPrice();
        $checkout = new Checkout($unitPrice);

        $checkout->addItem('A');
        $checkout->addItem('B');
        $checkout->addItem('C');
        $checkout->addItem('D');

        $this->assertSame(115, $checkout->total());
    }

    public function testCanGetTotalForSpecialPriceItems(): void
    {
        $factory = $this->createItemDetailFactory();
        $specialPrice = new SpecialPrice($factory);

        $checkout = new Checkout($specialPrice);

        $checkout->addItem('A');
        $checkout->addItem('A');
        $checkout->addItem('B');
        $checkout->addItem('A');
        $checkout->addItem('B');

        $this->assertSame(175, $checkout->total());
    }

    public function testCanGetTotalForMixedPriceItems(): void
    {
        $factory = $this->createItemDetailFactory();
        $specialPrice = new SpecialPrice($factory);

        $checkout = new Checkout($specialPrice);

        $checkout->addItem('A');
        $checkout->addItem('A');
        $checkout->addItem('B');
        $checkout->addItem('A');
        $checkout->addItem('B');
        $checkout->addItem('C');
        $checkout->addItem('D');

        $this->assertSame(210, $checkout->total());
    }

    private function createItemDetailFactory(): ItemDetailFactory
    {
        return new ItemDetailFactory();
    }
}
