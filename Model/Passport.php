<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NIM\WorkerBundle\Model;

class Passport
{
    protected $id;
    protected $country;
    protected $number;
    protected $dateOfIssue;
    protected $dateOfExpiry;
    protected $createdAt;
    protected $updatedAt;

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $dateOfExpiry
     */
    public function setDateOfExpiry($dateOfExpiry)
    {
        $this->dateOfExpiry = $dateOfExpiry;
    }

    /**
     * @return mixed
     */
    public function getDateOfExpiry()
    {
        return $this->dateOfExpiry;
    }

    /**
     * @param mixed $dateOfIssue
     */
    public function setDateOfIssue($dateOfIssue)
    {
        $this->dateOfIssue = $dateOfIssue;
    }

    /**
     * @return mixed
     */
    public function getDateOfIssue()
    {
        return $this->dateOfIssue;
    }

    /**
     * @param mixed $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}
