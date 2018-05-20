<?php

namespace App\DataFixtures;

use App\Entity\Inventory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class InventoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $names = [
            ['Швабра', 1, 'шт'],
            ['Щётка', 1, 'шт'],
            ['Перчатки', 1, 'пара'],
            ['Ведро', 1, 'шт'],
            ['Совок', 1, 'шт'],
            ['Моющее средство', 100, 'мл'],
            ['Порошок', 0.1, 'кг'],
        ];

        foreach ($names as $i => $name) {
            $inventory = new Inventory();
            $inventory
                ->setName($name[0])
                ->setStep($name[1])
                ->setUnit($name[2]);

            $this->addReference('inventory' . ($i + 1), $inventory);
            $manager->persist($inventory);
        }

        $manager->flush();
    }
}