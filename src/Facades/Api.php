<?php
namespace Serrex\RestBunble\Facades;

use Illuminate\Support\Facades\Facade;

class API extends Facade
{
    public static function getFacadeAccessor()
    {
        return "api";
    }
}
