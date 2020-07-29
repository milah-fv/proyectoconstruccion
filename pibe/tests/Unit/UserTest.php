<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserTest extends TestCase
{
    public function test_vista_login_admin()
    {
        $response = $this->get('/admin/login');

        $response->assertSuccessful();
        $response->assertViewIs('auth.admin_login');
    }

    
    public function test_autenticarse_como_administrador()
    {
        $user = new User(['name' => 'Milah']);
    
        auth()->login($user);
    
        $this->get('/');
        $this->assertAuthenticatedAs($user);
    }
    
}