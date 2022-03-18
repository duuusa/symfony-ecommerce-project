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
        $categoryEntity->setPicture('store-card-iphone-nav.png');
        $manager->persist($categoryEntity);

        foreach ($iphones as $iphone) {
            $productEntity = new Product();
            $productEntity->setName($iphone);
            $productEntity->setPicture('iphone_se_hero_large.jpeg');
            $productEntity->setDescription('new iPhone');
            $productEntity->setPrice(rand(499.99,1000 ));
            $productEntity->setStock(rand(10000,50000));
            $productEntity->setProductCategory($categoryEntity);
            $manager->persist($productEntity);
        }

        $manager->flush();

        $ipads = ['iPad Pro', 'iPad Air', 'iPad', 'iPad Mini'];

        $categoryEntity = new ProductCategory();
        $categoryEntity->setName('iPad');
        $categoryEntity->setPicture('store-card-ipad-nav.png');
        $manager->persist($categoryEntity);

        foreach ($ipads as $ipad) {
            $productEntity = new Product();
            $productEntity->setName($ipad);
            $productEntity->setPicture('ipad-card.jpeg');
            $productEntity->setDescription('new iPad');
            $productEntity->setPrice(799.99);
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
        $categoryEntity->setPicture('store-card-Watch-nav.png');
        $manager->persist($categoryEntity);

        foreach ($watchs as $watch) {
            $productEntity = new Product();
            $productEntity->setName($watch);
            $productEntity->setPicture('watch_s7_large_2x.jpeg');
            $productEntity->setDescription('new Apple Watch');
            $productEntity->setPrice(499.99);
            $productEntity->setStock(rand(20000,40000));
            $productEntity->setProductCategory($categoryEntity);
            $manager->persist($productEntity);
        }

        $manager->flush();

        $macs = ['MacBook Pro 14"', 'MacBook Pro 16"', 'MacBook Air', 'Mac Studio', 'Mac Pro', 'iMac', 'Mac mini'];
        $categoryEntity = new ProductCategory();
        $categoryEntity->setName('Mac');
        $categoryEntity->setPicture('store-card-Mac-nav.png');
        $manager->persist($categoryEntity);

        foreach ($macs as $mac) {
            $productEntity = new Product();
            $productEntity->setName($mac);
            $productEntity->setPicture('Mac-card.jpeg');
            $productEntity->setDescription('new Mac');
            $productEntity->setPrice(1999.99);
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
        $categoryEntity->setPicture('store-card-Accessories-nav.png');
        $manager->persist($categoryEntity);

        foreach ($accessories as $accessory) {
            $productEntity = new Product();
            $productEntity->setName($accessory);
            $productEntity->setPicture('store-card-airtags-nav.png');
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
        $categoryEntity->setPicture('store-card-homepod-nav.png');
        $manager->persist($categoryEntity);

        foreach ($others as $other) {
            $productEntity = new Product();
            $productEntity->setName($other);
            $productEntity->setPicture('store-card-homepod-nav.png');
            $productEntity->setDescription('new Product from us');
            $productEntity->setPrice(rand(99,400 ));
            $productEntity->setStock(rand(1000000,5000000));
            $productEntity->setProductCategory($categoryEntity);
            $manager->persist($productEntity);
        }

        $manager->flush();
    }
}
