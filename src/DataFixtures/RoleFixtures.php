<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Role;

class RoleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $role1 = new Role();
        $role1->setName('ROLE_USER');
        $manager->persist($role1);

        $role2 = new Role();
        $role2->setName('ROLE_ADMIN');
        $manager->persist($role2);


        $role3 = new Role();
        $role3->setName('ROLE_ACCOUNTS');
        $manager->persist($role3);

        $manager->flush();
    }
}
