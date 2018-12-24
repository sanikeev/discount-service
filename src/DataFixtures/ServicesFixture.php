<?php

namespace App\DataFixtures;

use App\Entity\Service;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ServicesFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 7; $i++){
            $service = new Service();
            $service->setTitle(sprintf('Услуга %d', $i));
            $manager->persist($service);
            $manager->flush();
        }
    }
}
