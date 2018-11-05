<?php
namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

trait AdminLogger {

    public function loggedIn()
    {
        $search = '?';
        $replace = $this->name;

        $msg = str_replace($search, $replace, self::MESSAGES[self::ADMIN_LOG_IN]);
        $this->log(self::ADMIN_LOG_IN, $msg);
    }

    public function updatedProperty(Model $model)
    {
        $property = str_replace('app\\', '', strtolower(get_class($model)));
        $id = $model->id;

        $search = ['?', '#property', '#id'];
        $replace = [$this->name, $property, $id];

        $msg = str_replace($search, $replace, self::MESSAGES[self::ADMIN_UPDATE]);
        $this->log(self::ADMIN_UPDATE, $msg);
    }

    public function deletedProperty(Model $model)
    {
        $property = str_replace('app\\', '', strtolower(get_class($model)));
        $id = $model->id;

        $search = ['?', '#property', '#id'];
        $replace = [$this->name, $property, $id];

        $msg = str_replace($search, $replace, self::MESSAGES[self::ADMIN_DELETE]);
        $this->log(self::ADMIN_DELETE, $msg);
    }

    private function log(string $channel, string $msg)
    {
        Log::channel($channel)->info($msg);
    }
}