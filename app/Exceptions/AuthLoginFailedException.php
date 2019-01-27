<?php

/**
 * Authentication Login Failed Custom Exceptions
 */
namespace App\Exceptions;

use Exception;

class AuthLoginFailedException extends Exception
{
	
	public function render()
	{
		return response()->json([
				'message' => 'These credentials do not match our records'
			], 422);
	}
}