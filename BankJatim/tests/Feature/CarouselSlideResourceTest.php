<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Filament\Facades\Filament;
use App\Models\CarouselSlide;
use Filament\Pages\Dashboard;

class CarouselSlideResourceTest extends TestCase
{
    use RefreshDatabase;

    public function test_carousel_slides_resource_page_can_be_rendered(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/admin/carousel-slides');

        $response->assertStatus(200);
    }

    public function test_carousel_slides_list_contains_image_column(): void
    {
        $user = User::factory()->create();
        CarouselSlide::factory()->create([
            'title' => 'Test Slide',
            'image_path' => 'test-image.jpg',
        ]);

        $response = $this->actingAs($user)->get('/admin/carousel-slides');

        $response->assertStatus(200);
        $response->assertSee('Test Slide');
    }
}
