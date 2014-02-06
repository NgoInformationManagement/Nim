<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NIM\WorkerBundle\Model\Core;

interface VisaInterface
{
    /**
     * @param string $country
     */
    public function setCountry($country);

    /**
     * @return string
     */
    public function getCountry();

    /**
     * @param integer $length
     */
    public function setLength($length);

    /**
     * @return integer
     */
    public function getLength();

    /**
     * @param \DateTime $startedAt
     */
    public function setStartedAt(\DateTime $startedAt = null);

    /**
     * @return \DateTime
     */
    public function getStartedAt();
}
