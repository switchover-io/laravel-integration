<?php

namespace SwitchoverLaravel;

use Illuminate\Support\Facades\Facade;

/**
 * 
 * @method static mixed toggleValue(string $name, $defaultValue, Context $context = null)
 * 
 * @method static array getToggleKeys()
 * 
 * @method static void refresh()
 * 
 */
class Switchover extends Facade {

    protected static function getFacadeAccessor()
    {
        return "switchover";
    }

}