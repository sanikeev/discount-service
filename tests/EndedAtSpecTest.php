<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 23.12.18
 * Time: 18:58
 */

namespace App\Tests;

use App\DTO\OrderDto;
use App\Entity\Rules;
use App\Service\Discount\Specs\EndedAtSpec;
use PHPUnit\Framework\TestCase;

class EndedAtSpecTest extends TestCase
{

    public function testApplySpec()
    {
        $rule = new Rules();
        $rule->setRuleParam([
            'ended_at' => '26.12.2018'
        ]);
        $dto = new OrderDto();
        $spec = new EndedAtSpec($rule);
        $result = $spec->isSatisfiedBy($dto);
        $this->assertTrue($result);
    }

    public function testFailSpec()
    {
        $rule = new Rules();
        $rule->setRuleParam([
            'ended_at' => '20.12.2018'
        ]);
        $dto = new OrderDto();
        $spec = new EndedAtSpec($rule);
        $result = $spec->isSatisfiedBy($dto);
        $this->assertFalse($result);
    }

    public function testNeverEnded()
    {
        $rule = new Rules();
        $rule->setRuleParam([]);
        $dto = new OrderDto();
        $spec = new EndedAtSpec($rule);
        $result = $spec->isSatisfiedBy($dto);
        $this->assertTrue($result);
    }

    public function testRuleNotSet()
    {
        $dto = new OrderDto();
        $rule = new Rules();
        $spec = new EndedAtSpec($rule);
        $result = $spec->isSatisfiedBy($dto);
        $this->assertTrue($result);
    }
}
