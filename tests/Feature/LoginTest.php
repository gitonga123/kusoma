<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
	use RefreshDatabase;

    /**
     * Failed Login Test Sample.
     *
     * @return void
     */
    public function test_error_when_a_user_sends_wrong_credentials()
    {
        $user = factory(\App\User::class)->create();
        $this->postJson('/login', [
        	'email' => $user->email,
        	'password' => 'wrong-password'
        ])->assertStatus(422)->assertJson([
        	'message' => 'These credentials do not match our records'
        ]);
    }
     /**
     * Successful Login Test Sample.
     *
     * @return void
     */
    public function test_correct_response_after_user_logins()
    {
        $user = factory(\App\User::class)->create();
        $this->postJson('/login', [
            'email' => $user->email,
            'password' => 'secret'
        ])->assertStatus(200)->assertJson([
            'status' => 'ok'
        ])->assertSessionHas('success', 'Successfully Logged in.');
    }
}
