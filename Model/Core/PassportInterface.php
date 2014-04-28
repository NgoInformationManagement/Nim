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

use Sylius\Component\Resource\Model\TimestampableInterface;

interface PassportInterface extends TimestampableInterface
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
     * @param \DateTime $dateOfExpiry
     */
    public function setDateOfExpiry(\DateTime $dateOfExpiry = null);

    /**
     * @return mixed
     */
    public function getDateOfExpiry();

    /**
     * @param \DateTime $dateOfIssue
     */
    public function setDateOfIssue(\DateTime $dateOfIssue = null);

    /**
     * @return \DateTime
     */
    public function getDateOfIssue();

    /**
     * @param string $number
     */
    public function setNumber($number);

    /**
     * @return string
     */
    public function getNumber();
}
