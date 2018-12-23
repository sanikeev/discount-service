<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 23.12.18
 * Time: 20:05
 */

namespace App\Tests;

use App\DTO\OrderDto;
use App\Entity\Rules;
use App\Service\Discount\Specs\AndSpec;
use App\Service\Discount\Specs\GenderSpec;
use App\Service\Discount\Specs\StartedAtSpec;
use PHPUnit\Framework\TestCase;

class AndSpecTest extends TestCase
{

    public function testSpec()
    {
        $rule = new Rules();
        $rule->setRuleParam([
            'started_at' => '20.12.2018',
            'gender' => OrderDto::GENDER_FEMALE
        ]);
        $dto = new OrderDto();
        $dto->setGender(OrderDto::GENDER_FEMALE);
        $spec1 = new StartedAtSpec($rule);
        $spec2 = new GenderSpec($rule);
        $andSpec = new AndSpec();
        $andSpec
            ->add($spec1)
            ->add($spec2)
        ;
        $result = $andSpec->isSatisfiedBy($dto);
        $this->assertTrue($result);
    }
}
