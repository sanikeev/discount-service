<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 23.12.18
 * Time: 19:29
 */

namespace App\Tests;

use App\DTO\OrderDto;
use App\Entity\Rules;
use App\Service\Discount\Specs\PhoneFilledSpec;
use PHPUnit\Framework\TestCase;

class PhoneFilledSpecTest extends TestCase
{
    public function testRuleNotSet()
    {
        $dto = new OrderDto();
        $rule = new Rules();
        $spec = new PhoneFilledSpec($rule);
        $result = $spec->isSatisfiedBy($dto);
        $this->assertTrue($result);
    }

    public function testPhoneFilled()
    {
        $dto = new OrderDto();
        $dto->setPhone('1234567890');
        $rule = new Rules();
        $rule->setRuleParam([
            'phone_filled' => true
        ]);
        $spec = new PhoneFilledSpec($rule);
        $result = $spec->isSatisfiedBy($dto);
        $this->assertTrue($result);
    }
}
