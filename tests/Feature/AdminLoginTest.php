<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminLoginTest extends TestCase
{
    public function test_login_success(): void
    {
        $response = $this->post('/admin/login', [
            'username' => 'admin',
            'password' => 'admin',
        ]);

        $this->assertAuthenticated('admin');
        $response->assertStatus(302);
        $response->assertRedirect('/admin');
    }

    public function test_login_fail_username_wrong(): void
    {
        $res = $this->post('/admin/login', [
            'username' => 'wrong',
            'password' => 'admin',
        ]);

        $res->assertStatus(302);
        $res->assertRedirect('/admin/login');
        $res->assertSessionHasErrors(['username' => 'username atau password salah']);
    }

    public function test_login_fail_password_wrong(): void
    {
        $res = $this->post('/admin/login', [
            'username' => 'admin',
            'password' => 'wrong',
        ]);

        $res->assertStatus(302);
        $res->assertRedirect('/admin/login');
        $res->assertSessionHasErrors(['username' => 'username atau password salah']);
    }
}
