<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 23.12.18
 * Time: 20:32
 */

namespace App\Tests;

use App\DTO\OrderDto;
use App\Entity\Rules;
use App\Service\Discount\Specs\AndSpec;
use App\Service\Discount\Specs\GenderSpec;
use App\Service\Discount\Specs\StartedAtSpec;
use App\Service\Discount\Strategy\MaxDiscountStrategy;
use PHPUnit\Framework\TestCase;

class MaxDiscountStrategyTest extends TestCase
{

    public function testStrategy()
    {
        $rule1 = new Rules();
        $rule1
            ->setRuleParam([
                'gender' => OrderDto::GENDER_FEMALE,
                'started_at' => '20.12.2018'
            ])
            ->setDiscountValue(5);
        $rule2 = new Rules();
        $rule2
            ->setRuleParam([
                'gender' => OrderDto::GENDER_FEMALE,
                'started_at' => '20.10.2018'
            ])
            ->setDiscountValue(25);
        $ruleCollection = [$rule1, $rule2];

        $order = new OrderDto();
        $order->setGender(OrderDto::GENDER_FEMALE);

        $discountStrategy = new MaxDiscountStrategy();

        foreach ($ruleCollection as $rule) {
            $genderSpec = new GenderSpec($rule);
            $startedAtSpec = new StartedAtSpec($rule);
            $andSpec = new AndSpec($rule);
            $andSpec
                ->add($genderSpec)
                ->add($startedAtSpec)
                ;
            $check = $andSpec->isSatisfiedBy($order);
            if(!$check) {
                continue;
            }
            $discountStrategy->add($rule);
        }

        $resultRule = $discountStrategy->value();

        $this->assertEquals(25, $resultRule->getDiscountValue());
    }
}
