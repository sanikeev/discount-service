<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 23.12.18
 * Time: 16:53
 */

namespace App\Service\Discount\Specs;


use App\DTO\OrderDto;
use App\Entity\Rules;

class EndedAtSpec implements SpecInterface
{
    protected $params;

    public function __construct(Rules $rule)
    {
        $this->params = $rule->getRuleParam();
    }

    public function isSatisfiedBy(OrderDto $item)
    {
        $dateString = $this->params['ended_at'] ?? null;
        if (!$dateString) { //never ending
            return true;
        }
        $endedAtDate = new \DateTime($dateString);
        $currentDate = new \DateTime();
        if ($currentDate <= $endedAtDate) {
            return true;
        }
        return false;
    }
}