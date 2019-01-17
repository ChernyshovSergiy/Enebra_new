<?php

namespace Tests\Feature\Admin;

use App\Const_article;
use App\Traits\Methods\CastToJson;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class ConstArticle extends TestCase
{
    use DatabaseTransactions, CastToJson;

    /** @test */
    public function add_constitution_article(): void
    {
        $constitution_article = factory(Const_article::class)->make();
        $response = $this->post('admin/const_articles',[
            'const_sections_id' => $constitution_article->const_sections_id,
            'article:en' => 'Create_Ok_en',
            'article:ru' => 'Create_Ok_ru',
            'side' => $constitution_article->side,
            'sort' => $constitution_article->sort
        ]);

        $response
            ->assertStatus(302)
            ->assertRedirect('admin/const_articles')
            ->assertSessionHas('status', 'success');

        $this->assertDatabaseHas('const_articles', [
            'article' => $this->castToJson('{"en": "Create_Ok_en", "ru": "Create_Ok_ru"}'),
            'const_sections_id' => $constitution_article->const_sections_id,
            'side' => $constitution_article->side,
            'sort' => $constitution_article->sort
        ]);
    }

    /** @test */
    public function edit_constitution_article(): void
    {
        $constitution_article = factory(Const_article::class)->make();
        $response = $this->post('admin/const_articles',[
            'const_sections_id' => $constitution_article->const_sections_id,
            'article:en' => 'Old_en',
            'article:ru' => 'Old_ru',
            'side' => $constitution_article->side,
            'sort' => $constitution_article->sort
        ]);

        $response
            ->assertStatus(302)
            ->assertRedirect('admin/const_articles')
            ->assertSessionHas('status', 'success');

        $this->assertDatabaseHas('const_articles', [
            'article' => $this->castToJson('{"en": "Old_en", "ru": "Old_ru"}'),
            'const_sections_id' => $constitution_article->const_sections_id,
            'side' => $constitution_article->side,
            'sort' => $constitution_article->sort
        ]);

        $data = [
            'const_sections_id' => $constitution_article->const_sections_id,
            'article:en' => 'Ok_en',
            'article:ru' => 'Ok_ru',
            'side' => $constitution_article->side,
            'sort' => $constitution_article->sort
        ];

        $this
            ->put(route('const_articles.update', Const_article::whereSort($constitution_article->sort)->first()->id), $data)
            ->assertStatus(302)
            ->assertRedirect('admin/const_articles')
            ->assertSessionHas('message', 'article update successful');

        $this->assertDatabaseHas('const_articles', [
            'article' => $this->castToJson('{"en": "Ok_en", "ru": "Ok_ru"}'),
            'const_sections_id' => $constitution_article->const_sections_id,
            'side' => $constitution_article->side,
            'sort' => $constitution_article->sort
        ]);
    }

    /** @test */
    public function delete_constitution_article(): void
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
            'const_sections_id' => $constitution_article->const_sections_id,
            'side' => $constitution_article->side,
            'sort' => $constitution_article->sort
        ]);

        $this
            ->delete(route('const_articles.destroy', Const_article::whereSort($constitution_article->sort)->first()->id))
            ->assertStatus(302)
            ->assertRedirect('admin/const_articles')
            ->assertSessionHas('message', 'article delete successful');

        $this->assertDatabaseMissing('const_articles', [
            'article' => $this->castToJson('{"en": "Ok_en", "ru": "Ok_ru"}'),
            'const_sections_id' => $constitution_article->const_sections_id,
            'side' => $constitution_article->side,
            'sort' => $constitution_article->sort
        ]);
    }
}
