<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 23.12.18
 * Time: 16:52
 */

namespace App\Service\Discount\Specs;


use App\DTO\OrderDto;
use App\Entity\Rules;

class GenderSpec implements SpecInterface
{
    protected $params;

    public function __construct(Rules $rule)
    {
        $this->params = $rule->getRuleParam();
    }

    public function isSatisfiedBy(OrderDto $item)
    {
        $rule = $this->params['gender'] ?? null;
        if (!$rule) {
            return true;
        }
        return $rule == $item->getGender();
    }
}