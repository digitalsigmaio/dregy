<?php
namespace App\Traits;

use Illuminate\Support\Facades\Log;

trait AdminLogger {
    public function loggedIn()
    {
        Log::channel('adminloggedin')->info('Admin: ' . $this->name . ' logged in.' );
    }
}