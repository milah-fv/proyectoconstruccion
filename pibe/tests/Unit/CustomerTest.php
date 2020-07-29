<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use App\Customer;

class CustomerTest extends TestCase
{
    /*
    |--------------------------------------------------------------------------
    | Pruebas Unitarias para la Clase Customer (Cliente)
    |--------------------------------------------------------------------------
    |
    | Aqui se encuentran las pruebas realizadas para la clase Producto
    | - Comprueba funcionalidad de las vistas
    | - Comprueba funcionalidad del método de de registro de clientes
    | - Comprueba funcionalidad del método de login de clientes
    |
    */

    /**
     * Función test_vista_registro, devuelve la vista correspondiente
     * @access public 
     * @return void
     */
    public function test_vista_registro()
    {
        $response = $this->get('/register');

        $response->assertSuccessful();
        $response->assertViewIs('auth.register');
    }

    /**
     * Función test_registro, prueba el método de registro de clientes en la base de datos
      * @access public 
     */
    public function test_registro()
    {
        $user = factory(Customer::class)->create([
            'password' => bcrypt($password = 'contraseña'),
        ]);
        $this->get('/register')
            ->Assertsee('Registrarse');
    }

    /**
     * Función test_vista_login, devuelve la vista correspondiente
     * @access public 
     * @return void
     */
    public function test_vista_login()
    {
        $response = $this->get('/login');

        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }

    /**
     * Función test_autenticarse_como_usuario, prueba el método de login de clientes
      * @access public 
     */
    public function test_autenticarse_como_usuario()
    {
        $user = new Customer(['name' => 'Milah']);
    
        auth()->login($user);
    
        $this->get('/');
        $this->assertAuthenticatedAs($user);
    }

}