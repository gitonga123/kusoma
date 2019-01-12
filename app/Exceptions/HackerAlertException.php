<?php
/**
 * Created by PhpStorm.
 * User: Ann Mutwiri
 * Date: 12-Jan-19
 * Time: 9:53 AM
 */

namespace App\Exceptions;

use Exception;
use Log;
class HackerAlertException extends Exception
{
    public function render()
    {
        return response()->json([
            'message' => 'hacker, you got no luck today'
        ]);
    }

    public function report() {
        Log::critical('Hacker Tried to hack us today');
    }
}