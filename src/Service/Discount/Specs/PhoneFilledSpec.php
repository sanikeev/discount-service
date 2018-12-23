<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 23.12.18
 * Time: 16:51
 */

namespace App\Service\Discount\Specs;


use App\DTO\OrderDto;
use App\Entity\Rules;

class PhoneFilledSpec implements SpecInterface
{
    protected $params;

    public function __construct(Rules $rule)
    {
        $this->params = $rule->getRuleParam();
    }

    public function isSatisfiedBy(OrderDto $item)
    {
        $rule = $this->params['phone_filled'] ?? null;
        if (is_null($rule)) {
            return true;
        }
        $phone = $item->getPhone();
        return !empty($phone);
    }
}