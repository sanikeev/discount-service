<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 23.12.18
 * Time: 16:48
 */

namespace App\Service\Discount\Specs;


use App\DTO\OrderDto;

interface SpecInterface
{
    public function isSatisfiedBy(OrderDto $item);
}