<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 23.12.18
 * Time: 19:39
 */

namespace App\Tests;

use App\DTO\OrderDto;
use App\Entity\Rules;
use App\Service\Discount\Specs\PhoneLastDigitsSpec;
use PHPUnit\Framework\TestCase;

class PhoneLastDigitsSpecTest extends TestCase
{
    public function testRuleNotSet()
    {
        $dto = new OrderDto();
        $rule = new Rules();
        $spec = new PhoneLastDigitsSpec($rule);
        $result = $spec->isSatisfiedBy($dto);
        $this->assertTrue($result);
    }

    public function testSpec()
    {
        $dto = new OrderDto();
        $dto->setPhone('+79009033883');
        $rule = new Rules();
        $rule->setRuleParam([
            'phone_last_digits' => 3883
        ]);
        $spec = new PhoneLastDigitsSpec($rule);
        $result = $spec->isSatisfiedBy($dto);
        $this->assertTrue($result);
    }
}
