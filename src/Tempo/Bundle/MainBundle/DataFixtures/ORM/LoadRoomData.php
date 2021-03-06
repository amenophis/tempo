<?php

/*
* This file is part of the Tempo-project package http://tempo.ikimea.com/>.
*
* (c) Mlanawo Mbechezi  <mlanawo.mbechezi@ikimea.com>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace Tempo\Bundle\MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Tempo\Bundle\MainBundle\Entity\Room;


class LoadRoomData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $rooms= array(
            'Room1',
            'Room2',
            'Room3',
            'Room4',
            'Room5',
        );

        $i = 1;
        foreach($rooms as $name)
        {
            $room = new Room();
            $room->setName($name);
            $room->setProject($this->getReference('project'.$i));

            $manager->persist($room);
            $manager->flush();
            $this->addReference('room'.$i, $room);
            $i++;
        }
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 7;
    }
}
