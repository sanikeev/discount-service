<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 23.12.18
 * Time: 20:02
 */

namespace App\Tests;

use App\DTO\OrderDto;
use App\Entity\Rules;
use App\Service\Discount\Specs\StartedAtSpec;
use PHPUnit\Framework\TestCase;

class StartedAtSpecTest extends TestCase
{
    public function testRuleNotSet()
    {
        $dto = new OrderDto();
        $rule = new Rules();
        $spec = new StartedAtSpec($rule);
        $result = $spec->isSatisfiedBy($dto);
        $this->assertFalse($result);
    }

    public function testApplySpec()
    {
        $rule = new Rules();
        $rule->setRuleParam([
            'started_at' => '20.12.2018'
        ]);
        $dto = new OrderDto();
        $spec = new StartedAtSpec($rule);
        $result = $spec->isSatisfiedBy($dto);
        $this->assertTrue($result);
    }

    public function testFailSpec()
    {
        $rule = new Rules();
        $rule->setRuleParam([
            'started_at' => '26.12.2018'
        ]);
        $dto = new OrderDto();
        $spec = new StartedAtSpec($rule);
        $result = $spec->isSatisfiedBy($dto);
        $this->assertFalse($result);
    }
}
