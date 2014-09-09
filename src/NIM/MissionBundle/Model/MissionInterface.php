<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NIM\MissionBundle\Model;

use Sylius\Component\Resource\Model\TimestampableInterface;

interface MissionInterface extends TimestampableInterface
{
    /**
     * Get the country of the mission
     *
     * @return string
     */
    public function getCountry();

    /**
     * Set the country of the mission
     *
     * @param string $country
     */
    public function setCountry($country);

    /**
     * Set the description of the mission
     *
     * @param string $description
     */
    public function setDescription($description);

    /**
     * Get the description of the mission
     *
     * @return string
     */
    public function getDescription();

    /**
     * Set the title of the mission
     *
     * @param string $title
     */
    public function setTitle($title);

    /**
     * Get the title of the mission
     *
     * @return string
     */
    public function getTitle();

    /**
     * Set the end of the mission
     *
     * @param \Datetime $endedAt
     */
    public function setEndedAt(\DateTime $endedAt = null);

    /**
     * get the end of the mission
     *
     * @return \Datetime
     */
    public function getEndedAt();

    /**
     * Set the beginning of the mission
     *
     * @param \Datetime $startedAt
     */
    public function setStartedAt(\DateTime $startedAt = null);

    /**
     * Set the beginning of the mission
     *
     * @return \Datetime
     */
    public function getStartedAt();
}
