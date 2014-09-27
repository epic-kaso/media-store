<?php
/**
 * Created by PhpStorm.
 * User: kaso
 * Date: 9/26/2014
 * Time: 2:49 PM
 */

namespace MediaStore\Context;


use Illuminate\Support\Facades\Facade;

class ContextFacade extends Facade {

    protected static function getFacadeAccessor()
    {
        return 'MediaStore\Context\Context';
    }
} 