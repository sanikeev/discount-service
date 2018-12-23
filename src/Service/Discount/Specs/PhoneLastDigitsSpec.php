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

class PhoneLastDigitsSpec implements SpecInterface
{
    protected $params;

    public function __construct(Rules $rule)
    {
        $this->params = $rule->getRuleParam();
    }

    public function isSatisfiedBy(OrderDto $item)
    {
        $rule = $this->params['phone_last_digits'] ?? null;
        if (is_null($rule)) {
            return true;
        }

        return $rule == substr($item->getPhone(), -4);
    }
}