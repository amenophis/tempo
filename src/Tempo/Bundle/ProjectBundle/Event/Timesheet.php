<?php

/*
* This file is part of the Tempo-project package http://tempo.ikimea.com/>.
*
* (c) Mlanawo Mbechezi  <mlanawo.mbechezi@ikimea.com>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace Tempo\Bundle\ProjectBundle\Event;

use Tempo\Bundle\ProjectBundle\Model\TimesheetInterface;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\HttpFoundation\Request;


class TimesheetEvent extends Event
{
    private $request;
    private $project;

    /**
     * @param TimesheetInterface $timesheet
     * @param Request $request
     */
    public function __construct(TimesheetInterface $project, Request $request)
    {
        $this->project = $project;
        $this->request = $request;
    }

    /**
     * @return ProjectInterface
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * @return Request
     */
    public function getRequest()
    {
        return $this->request;
    }

}