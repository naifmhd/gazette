<?php

namespace Naifmhd\Gazette\Facades;

use Illuminate\Support\Facades\Facade;

class Gazette extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'gazette';
    }
}
