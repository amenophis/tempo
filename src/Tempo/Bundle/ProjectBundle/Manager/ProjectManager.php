<?php

/*
* This file is part of the Tempo-project package http://tempo.ikimea.com/>.
*
* (c) Mlanawo Mbechezi  <mlanawo.mbechezi@ikimea.com>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace Tempo\Bundle\ProjectBundle\Manager;

use Tempo\Bundle\CoreBundle\Manager\BaseManager;
use Tempo\Bundle\ProjectBundle\Entity\Project;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @author Mbechezi Mlanawo <mlanawo.mbechezi@ikimea.com>
 */

class ProjectManager extends BaseManager
{
    /**
     * @param $id
     * @return mixed
     */
   public function find($id)
   {
       $project =  $this->getRepository()->find($id);

       if (!$project) {
           throw new NotFoundHttpException('Requested Project does not exist.');
       }

       return $project;
   }

    /**
     * @param $username
     * @return string
     */
   public function findOneByUsername($username)
   {
       return $this->getRepository()->findOneByUsername($username);
   }

    /**
     * @param $user
     */
    public function findAllByUser($user)
    {
        return $this->getRepository()->findAllByUser($user);
    }
}