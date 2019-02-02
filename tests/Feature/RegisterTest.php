<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mail;
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
}
