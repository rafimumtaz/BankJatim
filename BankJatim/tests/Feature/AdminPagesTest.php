<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminPagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_categories_admin_page()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/admin/categories');
        $response->assertSuccessful();
    }

    public function test_news_admin_page()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/admin/news');
        $response->assertSuccessful();
    }

    public function test_promos_admin_page()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/admin/promos');
        $response->assertSuccessful();
    }
}
