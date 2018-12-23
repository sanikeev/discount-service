<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 23.12.18
 * Time: 16:30
 */

namespace App\Service\Discount;


use App\DTO\OrderDto;
use App\Entity\Rules;
use App\Service\Discount\Specs\AndSpec;
use App\Service\Discount\Specs\BirthdayWeekAfterSpec;
use App\Service\Discount\Specs\BirthdayWeekBeforeSpec;
use App\Service\Discount\Specs\EndedAtSpec;
use App\Service\Discount\Specs\GenderSpec;
use App\Service\Discount\Specs\PhoneFilledSpec;
use App\Service\Discount\Specs\PhoneLastDigitsSpec;
use App\Service\Discount\Specs\ServiceSpec;
use App\Service\Discount\Specs\StartedAtSpec;
use App\Service\Discount\Strategy\MaxDiscountStrategy;

class DiscountService
{

    /**
     * @param OrderDto $order
     * @param Rules[] $rulesList
     * @return Rules
     */
    public function getDiscount(OrderDto $order, $rulesList) : Rules
    {
        $discountStrategy = new MaxDiscountStrategy();

        foreach ($rulesList as $rule) {
            $spec = $this->checkRule($rule);
            $check = $spec->isSatisfiedBy($order);
            if(!$check) {
                continue;
            }
            $discountStrategy->add($rule);
        }

        return $discountStrategy->value();
    }

    private function checkRule($rule)
    {
        $genderSpec = new GenderSpec($rule);
        $startedAtSpec = new StartedAtSpec($rule);
        $endedAtSpec = new EndedAtSpec($rule);
        $birthdayWeekBeforeSpec = new BirthdayWeekBeforeSpec($rule);
        $birthdayWeekAfterSpec = new BirthdayWeekAfterSpec($rule);
        $phoneFilledSpec = new PhoneFilledSpec($rule);
        $phoneLastDigitsSpec = new PhoneLastDigitsSpec($rule);
        $serviceSpec = new ServiceSpec($rule);
        $andSpec = new AndSpec();
        $andSpec
            ->add($genderSpec)
            ->add($startedAtSpec)
            ->add($endedAtSpec)
            ->add($birthdayWeekBeforeSpec)
            ->add($birthdayWeekAfterSpec)
            ->add($phoneFilledSpec)
            ->add($phoneLastDigitsSpec)
            ->add($serviceSpec)
        ;

        return $andSpec;
    }
}