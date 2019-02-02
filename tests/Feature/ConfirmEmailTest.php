<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
class ConfirmEmailTest extends TestCase
{
	use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_a_user_can_confirm_email()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();
        $this->get("/register/confirm/?token={$user->confirm_token}")->assertRedirect('/')->assertSessionHas('success', 'Your email has been confirmed');

        $this->assertTrue($user->fresh()->isConfirmed());
    }
}
