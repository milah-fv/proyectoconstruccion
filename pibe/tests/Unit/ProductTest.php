<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Product;

class ProductTest extends TestCase
{
     /*
    |--------------------------------------------------------------------------
    | Pruebas Unitarias para la Clase Product
    |--------------------------------------------------------------------------
    |
    | Aqui se encuentran las pruebas realizadas para la clase Producto
    | - Comprueba funcionalidad de la vista
    | - Comprueba funcionalidad del método de agregar productos a la base de datos
    |
    */
    
    /**
     * Función test_vista_productos, devuelve la vista correspondiente
     * @access public 
     * @return void
     */
     public function test_vista_productos()
    {
        $response = $this->get('/productos');

        $response->assertSuccessful();
        $response->assertViewIs('productos.productos');
    }

    /**
     * Función test_agregar_producto, prueba el método de registro del producto en la base de datos
     * @access public 
     */
    public function test_agregar_producto()
    {
        $product = factory(Product::class)->create();
        $product = $this->get('/productos');
        $product->assertSuccessful();
        $product->assertViewIs('productos.productos');
    }
}
