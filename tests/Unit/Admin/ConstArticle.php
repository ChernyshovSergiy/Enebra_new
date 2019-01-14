<?php

namespace Tests\Unit\Admin;

use App\Const_article;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ConstArticle extends TestCase
{
   use DatabaseTransactions;

    public function testAddConstArticle(): void
    {
////        $const_article = (new \App\Const_article)->addArticle($this->request);
//        $const_article = factory( Const_article::class )->create([
//            'article' => '{"en": "<p>Ok_en</p>", "ru": "<p>Ок_ру</p>"}',
//            'const_sections_id' => 1,
//            'side' => 1,
//            'sort' => 100
//        ]);
//        dd($const_article);

//        self::assertNotEmpty($const_article);
    }
}
