<?php

namespace Tests\Feature\Admin;

use App\Const_article;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ConstArticle extends TestCase
{
    use DatabaseTransactions;

    public function castToJson($json): \Illuminate\Database\Query\Expression
    {
        // Convert from array to json and add slashes, if necessary.
        if (is_array($json)) {
            $json = addslashes(json_encode($json));
        }
        // Or check if the value is malformed.
        elseif ($json === null || json_decode($json) === null) {
            throw new \Exception('A valid JSON string was not provided.');
        }
        return \DB::raw("CAST('{$json}' AS JSON)");
    }

    /** @test */
    public function add_constitution_article(): void
    {
        $constitution_article = factory(Const_article::class)->make();
        $response = $this->post('admin/const_articles',[
            'const_sections_id' => $constitution_article->const_sections_id,
            'article:en' => 'Ok_en',
            'article:ru' => 'Ok_ru',
            'side' => $constitution_article->side,
            'sort' => $constitution_article->sort
        ]);

        $response
            ->assertStatus(302)
            ->assertRedirect('admin/const_articles')
            ->assertSessionHas('status', 'success');

        $this->assertDatabaseHas('const_articles', [
            'article' => $this->castToJson('{"en": "Ok_en", "ru": "Ok_ru"}'),
            'const_sections_id' => 1,
            'side' => 1,
            'sort' => 101
        ]);

    }
}
