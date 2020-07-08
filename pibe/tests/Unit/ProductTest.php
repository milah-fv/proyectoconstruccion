<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    public function test_vista_productos()
    {
        $response = $this->get('/productos');

        $response->assertSuccessful();
        $response->assertViewIs('productos.productos');
    }
}
