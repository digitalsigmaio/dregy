<?php
namespace App\Traits;

use Illuminate\Support\Facades\Log;

trait AdminLogger {

    public function loggedIn()
    {
        $msg = str_replace('?', $this->name, self::MESSAGES[self::ADMIN_LOG_IN]);
        $this->log(self::ADMIN_LOG_IN, $msg);
    }

    private function log(string $channel, string $msg)
    {
        Log::channel($channel)->info($msg);
    }
}