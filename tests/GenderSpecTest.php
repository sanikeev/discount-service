<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 23.12.18
 * Time: 19:21
 */

namespace App\Tests;

use App\DTO\OrderDto;
use App\Entity\Rules;
use App\Service\Discount\Specs\GenderSpec;
use PHPUnit\Framework\TestCase;

class GenderSpecTest extends TestCase
{
    public function testRuleNotSet()
    {
        $dto = new OrderDto();
        $rule = new Rules();
        $spec = new GenderSpec($rule);
        $result = $spec->isSatisfiedBy($dto);
        $this->assertTrue($result);
    }

    public function testGenderRule()
    {
        $dto = new OrderDto();
        $dto->setGender(OrderDto::GENDER_FEMALE);
        $rule = new Rules();
        $rule->setRuleParam([
            'gender' => OrderDto::GENDER_FEMALE
        ]);
        $spec = new GenderSpec($rule);
        $result = $spec->isSatisfiedBy($dto);
        $this->assertTrue($result);
    }
}
