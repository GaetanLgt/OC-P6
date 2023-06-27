<?php

namespace App\DataFixtures;


use App\Entity\Figure;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class FigureFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $figure = new Figure();
        $figure->setName('Mute')
            ->setDescription('Saisie de la carre frontside de la planche entre les deux pieds avec la main avant.')
            ->setGroupe('grab')
            ->setSlug('mute')
            ->setCreatedAt(new \DateTimeImmutable('2021-06-01 08:00:00'));
        $manager->persist($figure);
        $this->addReference('mute', $figure);

        $figure = new Figure();
        $figure->setName('Sad')
            ->setDescription('Saisie de la carre backside de la planche, entre les deux pieds, avec la main avant.')
            ->setGroupe('grab')
            ->setSlug('sad')
            ->setCreatedAt(new \DateTimeImmutable('2021-06-01 08:00:00'));
        $manager->persist($figure);
        $this->addReference('sad', $figure);

        $figure = new Figure();
        $figure->setName('Indy')
            ->setDescription('Saisie de la carre frontside de la planche, entre les deux pieds, avec la main arrière.')
            ->setGroupe('grab')
            ->setSlug('indy')
            ->setCreatedAt(new \DateTimeImmutable('2021-06-01 08:00:00'));
        $manager->persist($figure);
        $this->addReference('indy', $figure);

        $figure = new Figure();
        $figure->setName('360')
            ->setDescription('Trois six pour un tour complet.')
            ->setGroupe('rotation')
            ->setSlug('360')
            ->setCreatedAt(new \DateTimeImmutable('2021-06-01 08:00:00'));
        $manager->persist($figure);
        $this->addReference('360', $figure);

        $figure = new Figure();
        $figure->setName('180')
            ->setDescription('Un demi-tour.')
            ->setGroupe('rotation')
            ->setSlug('180')
            ->setCreatedAt(new \DateTimeImmutable('2021-06-01 08:00:00'));
        $manager->persist($figure);
        $this->addReference('180', $figure);

        $figure = new Figure();
        $figure->setName('720')
            ->setDescription('Deux tours complets.')
            ->setGroupe('rotation')
            ->setSlug('720')
            ->setCreatedAt(new \DateTimeImmutable('2021-06-01 08:00:00'));
        $manager->persist($figure);
        $this->addReference('720', $figure);

        $figure = new Figure();
        $figure->setName('Backside Air')
            ->setDescription('Saisie de la carre backside de la planche, entre les deux pieds, avec la main avant.')
            ->setGroupe('rotation')
            ->setSlug('backside-air')
            ->setCreatedAt(new \DateTimeImmutable('2021-06-01 08:00:00'));
        $manager->persist($figure);
        $this->addReference('backside-air', $figure);

        $figure = new Figure();
        $figure->setName('Frontside Air')
            ->setDescription('Saisie de la carre frontside de la planche, entre les deux pieds, avec la main arrière.')
            ->setGroupe('rotation')
            ->setSlug('frontside-air')
            ->setCreatedAt(new \DateTimeImmutable('2021-06-01 08:00:00'));
        $manager->persist($figure);
        $this->addReference('frontside-air', $figure);

        $figure = new Figure();
        $figure->setName('Nose grab')
            ->setDescription('Saisie de la partie avant (nose) de la planche, avec la main avant.')
            ->setGroupe('grab')
            ->setSlug('nose-grab')
            ->setCreatedAt(new \DateTimeImmutable('2021-06-01 08:00:00'));

        $manager->persist($figure);
        $this->addReference('nose-grab', $figure);

        $figure = new Figure();
        $figure->setName('Tail grab')
            ->setDescription('Saisie de la partie arrière (tail) de la planche, avec la main arrière.')
            ->setGroupe('grab')
            ->setSlug('tail-grab')
            ->setCreatedAt(new \DateTimeImmutable('2021-06-01 08:00:00'));

        $manager->persist($figure);
        $this->addReference('tail-grab', $figure);

        $figure = new Figure();
        $figure->setName('Japan Air')
            ->setDescription('Saisie de l\'avant de la planche, avec la main avant, du côté de la carre frontside.')
            ->setGroupe('grab')
            ->setSlug('japan-air')
            ->setCreatedAt(new \DateTimeImmutable('2021-06-01 08:00:00'));

        $manager->persist($figure);
        $this->addReference('japan-air', $figure);

        $figure = new Figure();
        $figure->setName('Seat belt')
            ->setDescription('Saisie du carre frontside à l\'arrière avec la main avant.')
            ->setGroupe('grab')
            ->setSlug('seat-belt')
            ->setCreatedAt(new \DateTimeImmutable('2021-06-01 08:00:00'));

        $manager->persist($figure);
        $this->addReference('seat-belt', $figure);

        $figure = new Figure();
        $figure->setName('Truck driver')
            ->setDescription('Saisie du carre avant et arrière avec chaque main.')
            ->setGroupe('grab')
            ->setSlug('truck-driver')
            ->setCreatedAt(new \DateTimeImmutable('2021-06-01 08:00:00'));
            
        $manager->persist($figure);
        $this->addReference('truck-driver', $figure);

        $figure = new Figure();
        $figure->setName('Stalefish')
            ->setDescription('Saisie de la carre backside de la planche entre les deux pieds avec la main arrière.')
            ->setGroupe('grab')
            ->setSlug('stalefish')
            ->setCreatedAt(new \DateTimeImmutable('2021-06-01 08:00:00'));

        $manager->persist($figure);
        $this->addReference('stalefish', $figure);

        $figure = new Figure();
        $figure->setName('Tail slide')
            ->setDescription('Glissade sur la partie arrière de la planche.')
            ->setGroupe('slide')
            ->setSlug('tail-slide')
            ->setCreatedAt(new \DateTimeImmutable('2021-06-01 08:00:00'));

        $manager->persist($figure);
        $this->addReference('tail-slide', $figure);

        $figure = new Figure();
        $figure->setName('Nose slide')
            ->setDescription('Glissade sur la partie avant de la planche.')
            ->setGroupe('slide')
            ->setSlug('nose-slide')
            ->setCreatedAt(new \DateTimeImmutable('2021-06-01 08:00:00'));
            
        $manager->persist($figure);
        $this->addReference('nose-slide', $figure);

        $figure = new Figure();
        $figure->setName('Blunt slide')
            ->setDescription('Glissade sur le dessus de la planche.')
            ->setGroupe('slide')
            ->setSlug('blunt-slide')
            ->setCreatedAt(new \DateTimeImmutable('2021-06-01 08:00:00'));

        $manager->persist($figure);
        $this->addReference('blunt-slide', $figure);

        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }

    public function slugify($string)
    {
        return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string)));
    }
}