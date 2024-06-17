<?php

namespace Tests\Feature;

use App\Models\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminLogoutTest extends TestCase
{
    public function test_logout(): void
    {
        $res = $this
            ->actingAs(Admin::where('username', 'admin')->first(), 'admin')
            ->post('/admin/logout');

        $res->assertStatus(200);
    }
}
