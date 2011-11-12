<?php
namespace Dime\TimetrackerBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Dime\TimetrackerBundle\Entity\User;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load($manager)
    {
        $defaultUser = new User();
        $defaultUser->setFirstname('Default');
        $defaultUser->setLastname('User');
        $defaultUser->setEmail('johndoe@example.com');

        $manager->persist($defaultUser);
        $manager->flush();

        $this->addReference('default-user', $defaultUser);
    }
    
    /**
     * the order in which fixtures will be loaded
     * 
     * @return int
     */
    public function getOrder()
    {
        return 1;
    }
}
