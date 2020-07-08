<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use App\Customer;

class CustomerTest extends TestCase
{
    public function test_vista_registro()
    {
        $response = $this->get('/register');

        $response->assertSuccessful();
        $response->assertViewIs('auth.register');
    }

    public function test_registro()
    {
        $user = factory(Customer::class)->create([
            'password' => bcrypt($password = 'contraseña'),
        ]);
        $this->get('/register')
            ->Assertsee('Registrarse');
    }

    public function test_vista_login()
    {
        $response = $this->get('/login');

        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }

    public function test_autenticarse_como_usuario()
    {
        $user = new Customer(['name' => 'Milah']);
    
        auth()->login($user);
    
        $this->get('/');
        $this->assertAuthenticatedAs($user);
    }

}