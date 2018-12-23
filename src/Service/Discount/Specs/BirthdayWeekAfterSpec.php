<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 23.12.18
 * Time: 16:50
 */

namespace App\Service\Discount\Specs;


use App\DTO\OrderDto;
use App\Entity\Rules;

class BirthdayWeekAfterSpec implements SpecInterface
{
    protected $params;

    public function __construct(Rules $rule)
    {
        $this->params = $rule->getRuleParam();
    }

    public function isSatisfiedBy(OrderDto $item)
    {
        // if condition rule not set
        $rule = $this->params['birthday_week_after'] ?? null;
        if (!$rule) {
            return true;
        }
        $birthdayDate = new \DateTimeImmutable($item->getBirthday());
        $currentDate = new \DateTimeImmutable();
        $startDate = $birthdayDate->setDate(
            $currentDate->format('Y'),
            $birthdayDate->format('m'),
            $birthdayDate->format('d')
        );
        $endDate = $startDate->modify('+ 1 week');

        if ($startDate <= $currentDate && $currentDate <= $endDate) {
            return true;
        }
        return false;
    }
}