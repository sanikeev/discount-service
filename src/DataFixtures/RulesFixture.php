<?php

namespace App\DataFixtures;

use App\Entity\Rules;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class RulesFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $date = new \DateTimeImmutable();

        $rule1 = new Rules();
        $rule1->setTitle('Акция на товары');
        $rule1->setDiscountValue(10);
        $rule1->setRuleParam([
            'services' => [1,2,3],
            'started_at' => $date->modify('-1 week')->format('Y-m-d')
        ]);
        $manager->persist($rule1);

        $rule2 = new Rules();
        $rule2->setTitle('Счастливый номер');
        $rule2->setDiscountValue(25);
        $rule2->setRuleParam([
            'phone_filled' => true,
            'phone_last_digits' => 1234,
            'started_at' => $date->modify('-1 week')->format('Y-m-d')
        ]);
        $manager->persist($rule2);

        $manager->flush();
    }
}
