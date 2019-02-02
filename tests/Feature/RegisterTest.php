<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mail;
use App\User;
use App\Mail\ConfirmYourEmail;

class RegisterTest extends TestCase
{
	use RefreshDatabase;

    /**
     * Test Username On Registration.
     *
     * @return void
     */
    public function test_user_default_username_after_registration()
    {
        $this->withoutExceptionHandling();
        
    	$this->post('/register', [
    		'name' => 'james Karekia',
    		'email' => "jameskarekia@gmail.com",
    		'username' => str_slug('james Karekia'),
    		'password' => 'secret'
    	])->assertRedirect();

    	$this->assertDatabaseHas('users', [
    		'username' => str_slug('james Karekia')
    	]);
    }

    public function test_an_email_is_sent_to_new_user()
    {
        $this->withoutExceptionHandling();

        Mail::fake();

        $this->post('/register', [
            'name' => 'ann Karekia',
            'email' => "annkarekia@gmail.com",
            'username' => str_slug('ann Karekia'),
            'password' => 'secret'
        ])->assertRedirect();

        Mail::assertSent(ConfirmYourEmail::class);
    }

    public function test_a_user_has_a_token_after_registration()
    {
        $this->withoutExceptionHandling();

        Mail::fake();

        $this->post('/register', [
            'name' => 'ann Karekia',
            'email' => "annkarekia@gmail.com",
            'username' => str_slug('ann Karekia'),
            'password' => 'secret'
        ])->assertRedirect();
        $user  = User::find(1);

        $this->assertNotNull($user->confirm_token);
        $this->assertFalse($user->fresh()->isConfirmed());
    }
}
