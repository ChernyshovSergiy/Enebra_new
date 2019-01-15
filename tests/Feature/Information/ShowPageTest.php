<?php

namespace Tests\Feature\Information;

use Lang;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShowPageTest extends TestCase
{
    /** @test */
    public function HomePage(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee(Lang::get('index.how_to_start'));
    }

    /** @test */
    public function Introduction(): void
    {
        $response = $this->get('/#scroll-introduction');
        $response->assertStatus(200);
        $response->assertSee('<span class="zagolovok">Introduction</span>');
    }

    /** @test */
    public function Purpose(): void
    {
        $response = $this->get('/information/purpose');
        $response->assertStatus(200);
        $response->assertSee('<h1>Purpose</h1>');
    }

    /** @test */
    public function Video(): void
    {
        $response = $this->get('/#scroll-video');
        $response->assertStatus(200);
        $response->assertSee('<span class="zagolovok">Video</span>');
    }

    /** @test */
    public function Video_information_part(): void
    {
        $response = $this->get('/information/video/informative-part');
        $response->assertStatus(200);
        $response->assertSee('<h1>Informative part</h1>');
    }

    /** @test */
    public function Video_technology_part(): void
    {
        $response = $this->get('/information/video/technology-part');
        $response->assertStatus(200);
        $response->assertSee('<h1>Technology</h1>');
    }

    /** @test */
    public function Video_enebra_materials_part(): void
    {
        $response = $this->get('/information/video/enebra-materials-part');
        $response->assertStatus(200);
        $response->assertSee('<h1>Enebra videos</h1>');
    }

    /** @test */
    public function Video_motivation_part(): void
    {
        $response = $this->get('/information/video/motivation-part');
        $response->assertStatus(200);
        $response->assertSee('<h1>Motivation part</h1>');
    }

    /** @test */
    public function Description(): void
    {
        $response = $this->get('/information/description');
        $response->assertStatus(200);
        $response->assertSee('<h1>Description</h1>');
    }

    /** @test */
    public function Action_plan(): void
    {
        $response = $this->get('/information/action-plan');
        $response->assertStatus(200);
        $response->assertSee('<h1>Action plan</h1>');
    }

    /** @test */
    public function What_to_do(): void
    {
        $response = $this->get('/information/what-to-do');
        $response->assertStatus(200);
        $response->assertSee('<h1>What to do?</h1>');
    }

    /** @test */
    public function Documents(): void
    {
        $response = $this->get('/#scroll-documents');
        $response->assertStatus(200);
        $response->assertSee('<h3><span>1</span>Purpose</h3>');
    }

    /** @test */
    public function Constitution_draft(): void
    {
        $response = $this->get('/information/constitution-draft');
        $response->assertStatus(200);
        $response->assertSee('<h1>Constitution draft</h1>');
    }

    /** @test */
    public function FAQ(): void
    {
        $response = $this->get('/information/faq');
        $response->assertStatus(200);
        $response->assertSee('<h1>FAQ</h1>');
    }
}
