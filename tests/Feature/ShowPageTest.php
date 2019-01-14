<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Lang;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShowPageTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    /** @test */
    public function admin_route_dashboard(): void
    {
        $response = $this->get('admin');
        $response->assertSee(Lang::get('admin.dashboard'));
    }

    /** @test */
    public function image_categories_route_index(): void
    {
        $response = $this->get('admin/image_categories');
        $response->assertSee(Lang::get('admin.listing_image_category'));
    }

    /** @test */
    public function image_categories_route_create(): void
    {
        $response = $this->get('admin/image_categories/create');
        $response->assertSee(Lang::get('admin.create_new_image_category'));
    }

    /** @test */
    public function image_categories_route_edit(): void
    {
        $response = $this->get('admin/image_categories/1/edit');
        $response->assertSee(Lang::get('admin.edit_image_category'));
    }
}
