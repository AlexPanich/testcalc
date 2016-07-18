<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 018 18.07.16
 * Time: 15:50
 */

namespace App\Services;


class Calculator
{
    public static function sum(...$args)
    {

        return array_reduce($args[0], function($carry, $item) {
            if (preg_match('/^[0-9]+$/', $item)) {
                return $carry + $item;
            }
        }, 0);
    }
}