<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 23.12.18
 * Time: 19:50
 */

namespace App\Tests;

use App\DTO\OrderDto;
use App\Entity\Rules;
use App\Service\Discount\Specs\ServiceSpec;
use PHPUnit\Framework\TestCase;

class ServiceSpecTest extends TestCase
{
    public function testRuleNotSet()
    {
        $dto = new OrderDto();
        $rule = new Rules();
        $spec = new ServiceSpec($rule);
        $result = $spec->isSatisfiedBy($dto);
        $this->assertTrue($result);
    }

    public function testServicesNotEmpty()
    {
        $dto = new OrderDto();
        $dto->setService([]);
        $rule = new Rules();
        $rule->setRuleParam([
            'services' => [1]
        ]);
        $spec = new ServiceSpec($rule);
        $result = $spec->isSatisfiedBy($dto);
        $this->assertFalse($result);
    }

    public function testApplyRuleFail()
    {
        $dto = new OrderDto();
        $dto->setService([1,2,3]);
        $rule = new Rules();
        $rule->setRuleParam([
            'services' => [1]
        ]);
        $spec = new ServiceSpec($rule);
        $result = $spec->isSatisfiedBy($dto);
        $this->assertFalse($result);
    }

    public function testApplyRule()
    {
        $dto = new OrderDto();
        $dto->setService([1,2,3]);
        $rule = new Rules();
        $rule->setRuleParam([
            'services' => [1, 3, 2]
        ]);
        $spec = new ServiceSpec($rule);
        $result = $spec->isSatisfiedBy($dto);
        $this->assertTrue($result);
    }
}
