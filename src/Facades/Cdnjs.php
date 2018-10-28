<?php

namespace Faryar\Cdnjs\Facades;

use Illuminate\Support\Facades\facade;

class Cdnjs extends Facade
{
    /**
     * return Cdnjs Facade class.
     *
     * @return void
     */
    public static function getFacadeAccessor()
    {
        return 'cdnjs-facade';
    }
}
