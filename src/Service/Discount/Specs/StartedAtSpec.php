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

class StartedAtSpec implements SpecInterface
{
    protected $params;

    public function __construct(Rules $rule)
    {
        $this->params = $rule->getRuleParam();
    }

    public function isSatisfiedBy(OrderDto $item)
    {
        $dateString = $this->params['started_at'] ?? null;
        if (!$dateString) { // required param!
            return false;
        }
        $startedAt = new \DateTime($dateString);
        $currentDate = new \DateTime();
        if ($currentDate >= $startedAt) {
            return true;
        }
        return false;
    }
}