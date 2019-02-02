<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

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
    		'name' => 'Ann Karekia',
    		'email' => "annkarekia@gmail.com",
    		'username' => str_slug('Ann Karekia'),
    		'password' => 'secret'
    	])->assertRedirect();

    	$this->assertDatabaseHas('users', [
    		'username' => str_slug('Ann Karekia')
    	]);

    }
}
