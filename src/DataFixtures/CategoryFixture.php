<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class CategoryFixture extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $category = new Category();
        $category->setName('grab');
        $manager->persist($category);
        $this->addReference('cat-grab', $category);

        $category = new Category();
        $category->setName('rotation');
        $manager->persist($category);
        $this->addReference('cat-rotation', $category);

        $category = new Category();
        $category->setName('flip');
        $manager->persist($category);
        $this->addReference('cat-flip', $category);

        $category = new Category();
        $category->setName('slide');
        $manager->persist($category);
        $this->addReference('cat-slide', $category);
        
        $manager->flush();
    }

    public function getOrder(): int
    {
        return 2;
    }
}
