<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;

use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

use App\Entity\Role;

class UserFixtures extends Fixture implements ContainerAwareInterface
{
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    // ensure RoleFixtures executed before UserFixtures
    public function getDependencies()
    {
        return array(
            RoleFixtures::class,
        );
    }

    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        /**
         * @var EntityManager
         */
        $em = $this->container->get('doctrine')->getEntityManager('default');

        $roleUser = $em->getRepository(Role::class)->findOneByName('ROLE_USER');
        $roleAdmin = $em->getRepository(Role::class)->findOneByName('ROLE_ADMIN');
        $roleAccounts = $em->getRepository(Role::class)->findOneByName('ROLE_ACCOUNTS');


        $userUser = $this->createUser('user', 'user', $roleUser);
        $userAdmin = $this->createUser('admin', 'admin', $roleAdmin);
        $user3 = $this->createUser('accounts', 'accounts', $roleAccounts);

        $manager->persist($userUser);
        $manager->persist($userAdmin);
        $manager->persist($user3);

        $manager->flush();
    }

    private function createUser($username, $plainPassword, $role):User
    {
        $user = new User();
        $user->setUsername($username);
        $user->setRole($role);
        // password - and encoding
        $encodedPassword = $this->passwordEncoder->encodePassword($user, $plainPassword);
        $user->setPassword($encodedPassword);
        return $user;
    }


}
