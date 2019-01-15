<?php

namespace Tests\Feature\Information;

use App\Inf_subscriber;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Lang;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SubscribeTest extends TestCase
{
    use DatabaseTransactions;

    public function testForm(): void
    {
        $response = $this->get('/');
        $response
            ->assertStatus(200)
            ->assertSee(Lang::get('app.to_learn'));
    }

    public function testErrors(): void
    {
        $response = $this->post('/subscribe',[
            'email' => ''
        ]);
        $response
            ->assertStatus(302)
            ->assertSessionHasErrors(['email']);
    }

    public function testSuccess(): void
    {
        $subscriber = factory(Inf_subscriber::class)->make();
        $response = $this->post('/subscribe',[
            'email' => $subscriber->email
        ]);
        $response
            ->assertStatus(302)
            ->assertRedirect('/')
            ->assertSessionHas('status', Lang::get('mail.check_your_email'));
    }

    public function testVerifyIncorrect(): void
    {
        $link = '/verify/'. str_random(100);
        $response = $this->get($link);
        $response
            ->assertStatus(404)
            ->assertSee('Sorry, the page you are looking for could not be found');
    }

    public function testVerify(): void
    {
        $subscriber = factory(Inf_subscriber::class)->create([
            'token' => str_random(100),
        ]);
        $response = $this->get('/verify/'.$subscriber->token);
        $response
            ->assertStatus(302)
            ->assertRedirect('/')
            ->assertSessionHas('status', Lang::get('mail.your_email_is_confirmed'));
    }
}
