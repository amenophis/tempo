<?php

/*
* This file is part of the Tempo-project package http://tempo.ikimea.com/>.
*
* (c) Mlanawo Mbechezi  <mlanawo.mbechezi@ikimea.com>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace Tempo\Bundle\ProjectBundle\Entity;

/**
 * @author Mbechezi Mlanawo <mlanawo.mbechezi@ikimea.com>
 */

use Tempo\Bundle\ProjectBundle\Model\Timesheet as BaseTimesheet;

class Timesheet extends BaseTimesheet
{

    /**
     * {@inheritdoc}
     */
    public function prePersist()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function preUpdate()
    {

    }

}
