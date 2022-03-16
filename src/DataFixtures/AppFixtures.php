<?php

namespace App\DataFixtures;

use App\Entity\Product;
use App\Entity\ProductCategory;
use App\Entity\Store;
use App\Entity\Town;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $towns = ['Paris', 'New York', 'Los Angeles', 'London', 'Sydney', 'Berlin', 'Barcelone', 'San Francisco', 'Lyon', 'Marseille'];

        foreach ($towns as $town) {
            $townEntity = new Town();
            $townEntity->setName($town);
            $townEntity->setPopulation(rand(1000000, 10000000));
            $manager->persist($townEntity);

            for ($j = 0; $j < 4; $j++) {
                $store = new Store();
                $store->setName('Apple Store' . $j);
                $store->setTown($townEntity);
                $manager->persist($store);
            }
        }

        $manager->flush();

        $iphones = [
            'iPhone 13 Pro Max','iPhone 13 Pro','iPhone 12 Pro Max','iPhone 12 Pro',
            'iPhone 13','iPhone 12','iPhone 11','iPhone SE'
        ];

        $categoryEntity = new ProductCategory();
        $categoryEntity->setName('iPhone');
        $manager->persist($categoryEntity);

        foreach ($iphones as $iphone) {
            $productEntity = new Product();
            $productEntity->setName($iphone);
            $productEntity->setDescription('new iPhone');
            $productEntity->setPrice(rand(700,1400 ));
            $productEntity->setStock(rand(10000,50000));
            $productEntity->setProductCategory($categoryEntity);
            $manager->persist($productEntity);
        }

        $manager->flush();

        $ipads = ['iPad Pro', 'iPad Air', 'iPad', 'iPad Mini'];

        $categoryEntity = new ProductCategory();
        $categoryEntity->setName('iPad');
        $manager->persist($categoryEntity);

        foreach ($ipads as $ipad) {
            $productEntity = new Product();
            $productEntity->setName($ipad);
            $productEntity->setDescription('new iPad');
            $productEntity->setPrice(rand(600,1400 ));
            $productEntity->setStock(rand(5000,25000));
            $productEntity->setProductCategory($categoryEntity);
            $manager->persist($productEntity);
        }

        $manager->flush();

        $watchs = [
            'Watch Serie 7 41mm Cellular','Watch Serie 7 45mm Cellular','Watch Serie 7 41mm','Watch Serie 7 45mm',
            'Watch Serie 3 38mm', 'Watch Serie 3 42mm','Watch Serie SE Cellular', 'Watch Serie SE'
        ];

        $categoryEntity = new ProductCategory();
        $categoryEntity->setName('Watch');
        $manager->persist($categoryEntity);

        foreach ($watchs as $watch) {
            $productEntity = new Product();
            $productEntity->setName($watch);
            $productEntity->setDescription('new Apple Watch');
            $productEntity->setPrice(rand(300,800 ));
            $productEntity->setStock(rand(20000,40000));
            $productEntity->setProductCategory($categoryEntity);
            $manager->persist($productEntity);
        }

        $manager->flush();

        $macs = ['MacBook Pro 14"', 'MacBook Pro 16"', 'MacBook Air', 'Mac Studio', 'Mac Pro', 'iMac', 'Mac mini'];
        $categoryEntity = new ProductCategory();
        $categoryEntity->setName('Mac');
        $manager->persist($categoryEntity);

        foreach ($macs as $mac) {
            $productEntity = new Product();
            $productEntity->setName($mac);
            $productEntity->setDescription('new Mac');
            $productEntity->setPrice(rand(1000,5000 ));
            $productEntity->setStock(rand(80000,100000));
            $productEntity->setProductCategory($categoryEntity);
            $manager->persist($productEntity);
        }

        $manager->flush();

        $accessories = [
            'AirTag','Apple Pencil','Pro Display XDR','Studio Display','Cases', 'Protections', 'Watch Straps','Keyboards'
        ];
        $categoryEntity = new ProductCategory();
        $categoryEntity->setName('Accessories');
        $manager->persist($categoryEntity);

        foreach ($accessories as $accessory) {
            $productEntity = new Product();
            $productEntity->setName($accessory);
            $productEntity->setDescription('new Accessory');
            $productEntity->setPrice(rand(49,2400 ));
            $productEntity->setStock(rand(10000,50000));
            $productEntity->setProductCategory($categoryEntity);
            $manager->persist($productEntity);
        }

        $manager->flush();

        $others = ['Homepod','AirPods','AirPods Pro','AirPods Max', 'Apple TV 4k', 'Apple TV',];

        $categoryEntity = new ProductCategory();
        $categoryEntity->setName('Others');
        $manager->persist($categoryEntity);

        foreach ($others as $other) {
            $productEntity = new Product();
            $productEntity->setName($other);
            $productEntity->setDescription('new Product from us');
            $productEntity->setPrice(rand(99,400 ));
            $productEntity->setStock(rand(1000000,5000000));
            $productEntity->setProductCategory($categoryEntity);
            $manager->persist($productEntity);
        }

        $manager->flush();
    }
}
