<?php

namespace App\DataFixtures;

use App\Entity\Acces;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AccesFixtures extends Fixture
{

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new Acces();
        $user->setUsername('dada');
        $user->setPassword($this->encoder->encodePassword($user,'dada'));
        $manager->persist($user);

        $manager->flush();
    }
}
