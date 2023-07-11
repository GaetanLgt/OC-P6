<?php

namespace App\DataFixtures;

use App\Entity\Media;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class MediaFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $media = new Media();
        $media->setUrl('https://picsum.photos/400/200')
        ->setName('Mute')
            ->setType('image')
            ->setFigure($this->getReference('mute'));
        $manager->persist($media);

        $media = new Media();
        $media->setUrl('https://picsum.photos/400/200')
            ->setName('Indy')
            ->setType('image')
            ->setFigure($this->getReference('indy'));
        $manager->persist($media);

        $media = new Media();
        $media->setUrl('https://picsum.photos/400/200')
            ->setName('Sad')
            ->setType('image')
            ->setFigure($this->getReference('sad'));
        $manager->persist($media);

        $media = new Media();
        $media->setContent('<iframe width="315" height="200" src="https://www.youtube.com/embed/EzGPmg4fFL8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>')
            ->setName('360')
            ->setType('embed')
            ->setFigure($this->getReference('360'));
        $manager->persist($media);

        $media = new Media();
        $media->setContent('<iframe width="560" height="315" src="https://www.youtube.com/embed/mBB7CznvSPQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>')
            ->setName('backside-air')
            ->setType('embed')
            ->setFigure($this->getReference('backside-air'));
        $manager->persist($media);

        $media = new Media();
        $media->setUrl('https://www.youtube.com/embed/2g811Eo7K8U')
            ->setName('180')
            ->setType('video')
            ->setFigure($this->getReference('180'));

        $media = new Media();

        

        $manager->flush();
    }

    public function getOrder()
    {
        return 4;
    }
}
