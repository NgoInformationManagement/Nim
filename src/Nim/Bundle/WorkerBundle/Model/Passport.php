<?php

/*
 * This file is part of the Nim package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nim\Bundle\WorkerBundle\Model;

use Nim\Component\Resource\Model\SoftDeletableTrait;
use Nim\Component\Resource\Model\TimestampableTrait;

class Passport implements PassportInterface
{
    use \Nim\Component\Resource\Model\SoftDeletableTrait,
        \Nim\Component\Resource\Model\TimestampableTrait;

    protected $id;
    protected $country;
    protected $number;
    protected $dateOfIssue;
    protected $dateOfExpiry;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * {@inheritdoc}
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * {@inheritdoc}
     */
    public function setDateOfExpiry(\DateTime $dateOfExpiry = null)
    {
        $this->dateOfExpiry = $dateOfExpiry;
    }

    /**
     * {@inheritdoc}
     */
    public function getDateOfExpiry()
    {
        return $this->dateOfExpiry;
    }

    /**
     * {@inheritdoc}
     */
    public function setDateOfIssue(\DateTime $dateOfIssue = null)
    {
        $this->dateOfIssue = $dateOfIssue;
    }

    /**
     * {@inheritdoc}
     */
    public function getDateOfIssue()
    {
        return $this->dateOfIssue;
    }

    /**
     * {@inheritdoc}
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * {@inheritdoc}
     */
    public function getNumber()
    {
        return $this->number;
    }
}
