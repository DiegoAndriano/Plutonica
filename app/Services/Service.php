<?php

namespace App\Services;

abstract class Service{

    public static function perform()
    {
        return (new static)->handle();
    }

    abstract public function handle();
}
