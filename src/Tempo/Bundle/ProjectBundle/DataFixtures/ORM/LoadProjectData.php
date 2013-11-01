<?php

/*
* This file is part of the Tempo-project package http://tempo.ikimea.com/>.
*
* (c) Mlanawo Mbechezi  <mlanawo.mbechezi@ikimea.com>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace Tempo\Bundle\ProjectBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;

use Tempo\Bundle\ProjectBundle\Entity\Project;

class LoadProjectData extends AbstractFixture implements FixtureInterface
{

    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $userList = array('admin', 'john.doe');
        for ($i = 1; $i <= 10; $i++) {
            $name = str_shuffle('Le Lorem Ipsum');

            $digit = str_shuffle('123456789');
            $code = str_shuffle(substr($name, 0, 3).substr($digit, 0, 3));

            $project = new Project();
            $project->setName($name);
            $project->setCode($code );
            $project->setSlug(str_replace(' ', '-', $name));
            $project->setDescription('Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.');
            $project->setOrganization( $this->getReference('organization'.$i));
            $project->setStatus( rand(1, 3) );
            $project->setAvancement($digit[0]);
            $project->setCreated(new \DateTime());
            $project->setUpdated(new \DateTime());
            $project->setIsActive(true);
            $project->setBeginning(new \DateTime());
            $project->setEnding(new \DateTime());
            $project->addTeam($this->getReference($userList[array_rand($userList, 1)]));

            if($i > 5) {
                $digit = str_shuffle('12345');
                $project->setParent($this->getReference('project1'));
                //$project->setParent($this->getReference('project'.$digit[0]));
            }

            $manager->persist($project);
            $manager->flush();

            $this->addReference('project'.$i, $project);
        }
    }

    /**
     * @return int
     */
    public function getOrder()
    {
        return 3;
    }
}
