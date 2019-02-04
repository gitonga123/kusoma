<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Config;


abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function loginAdmin()
    {
    	$user = factory(\App\User::class)->create();
        Config::push('blog.admin', $user->email);
        $this->actingAs($user);
    }
}
