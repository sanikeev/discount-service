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

class BirthdayWeekBeforeSpec implements SpecInterface
{
    protected $params;

    public function __construct(Rules $rule)
    {
        $this->params = $rule->getRuleParam();
    }

    public function isSatisfiedBy(OrderDto $item)
    {
        // if condition rule not used
        $rule = $this->params['birthday_week_before'] ?? null;
        if (!$rule) {
            return true;
        }
        $birthdayDate = new \DateTimeImmutable($item->getBirthday());
        $currentDate = new \DateTimeImmutable();
        $endDate = $birthdayDate->setDate(
            $currentDate->format('Y'),
            $birthdayDate->format('m'),
            $birthdayDate->format('d')
        );
        $startDate = $endDate->modify('- 1 week');

        if ($startDate <= $currentDate && $currentDate <= $endDate) {
            return true;
        }
        return false;
    }
}