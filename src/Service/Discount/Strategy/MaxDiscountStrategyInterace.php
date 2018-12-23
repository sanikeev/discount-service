<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 23.12.18
 * Time: 20:19
 */

namespace App\Service\Discount\Strategy;


use App\Entity\Rules;

interface MaxDiscountStrategyInterace
{

    public function add(Rules $rule);
    public function value() : Rules;
}