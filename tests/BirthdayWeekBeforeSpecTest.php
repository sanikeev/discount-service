<?php

namespace App\Tests;

use App\DTO\OrderDto;
use App\Entity\Rules;
use App\Service\Discount\Specs\BirthdayWeekBeforeSpec;
use PHPUnit\Framework\TestCase;

class BirthdayWeekBeforeSpecTest extends TestCase
{
    /** @var OrderDto */
    protected $dto;
    public function setUp()
    {
        parent::setUp();
        $this->dto = new OrderDto();
    }

    public function testApplySpec()
    {
        $rule = new Rules();
        $rule->setRuleParam([
            'birthday_week_before' => true,
        ]);
        $this->dto->setBirthday('26.12.1986');
        $spec = new BirthdayWeekBeforeSpec($rule);
        $result = $spec->isSatisfiedBy($this->dto);
        $this->assertTrue($result);
    }

    public function testFailSpec()
    {
        $rule = new Rules();
        $rule->setRuleParam([
            'birthday_week_before' => true,
        ]);
        $this->dto->setBirthday('20.12.1986');
        $spec = new BirthdayWeekBeforeSpec($rule);
        $result = $spec->isSatisfiedBy($this->dto);
        $this->assertFalse($result);
    }

    public function testRuleNotSet()
    {
        $dto = new OrderDto();
        $rule = new Rules();
        $spec = new BirthdayWeekBeforeSpec($rule);
        $result = $spec->isSatisfiedBy($dto);
        $this->assertTrue($result);
    }
}
