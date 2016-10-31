<?php

namespace AppBundle\DataFixtures\ORM;

use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\User;

class UserFixture extends AbstractFixture implements
    OrderedFixtureInterface,
    ContainerAwareInterface
{

     /**
     * @var ContainerInterface
     */
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        $userManager = $this->container->get('fos_user.user_manager');

        $userAdmin = $userManager->createUser();

        $userAdmin->setUsername('admin');
        $userAdmin->setPlainPassword('test');
        $userAdmin->setEmail('admin@admin.com');
        $userAdmin->setRoles(array('ROLE_SUPER_ADMIN'));
        $userAdmin->setEnabled(true);

        $userManager->updateUser($userAdmin, true);
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 1;
    }
}
