<?php

/*
* This file is part of the Tempo-project package http://tempo.ikimea.com/>.
*
* (c) Mlanawo Mbechezi  <mlanawo.mbechezi@ikimea.com>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace Tempo\Bundle\ActivityBundle\Model;

use Tempo\Bundle\ProjectBundle\Model\ProjectProviderInterface;

/**
 * Activity
 *
 */
interface ActivityProviderInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();

    /**
     * Set provider
     *
     * @param string $provider
     * @return Activity
     */
    public function setProvider(ProjectProviderInterface $provider);

    /**
     * Get provider
     *
     * @return string
     */
    public function getProvider();

    /**
     * Set message
     *
     * @param string $message
     * @return Activity
     */
    public function setMessage($message);

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage();

    /**
     * Set parameters
     *
     * @param array $parameters
     * @return Activity
     */
    public function setParameters($parameters);

    /**
     * Get parameters
     *
     * @return array
     */
    public function getParameters();

    /**
     * Set datetime
     *
     * @param \DateTime $datetime
     * @return Activity
     */
    public function setCreated($datetime);

    /**
     * Get datetime
     *
     * @return \DateTime
     */
    public function getCreated();

    /**
     * @return Object
     */
    public function getData();
}
