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

    public function test_if_user_is_redirected_on_wrong_token()
    {
    	$this->withoutExceptionHandling();

        $user = factory(User::class)->create();
        $this->get("/register/confirm/?token={$user->email}")->assertRedirect('/')->assertSessionHas('error', 'Confirmation Token is broken');

        $this->assertFalse($user->fresh()->isConfirmed());
    }
}
