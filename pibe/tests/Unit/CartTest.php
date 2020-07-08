<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CartTest extends TestCase
{
    public function test_vista_carrito()
    {
        $response = $this->get('/carrito');

        $response->assertSuccessful();
        $response->assertViewIs('cart.cart');
    }
}
