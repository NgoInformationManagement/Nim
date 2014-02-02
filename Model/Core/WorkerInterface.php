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

use Doctrine\Common\Collections\ArrayCollection;
use NIM\WorkerBundle\Model\Agency;

interface WorkerInterface
{
    /**
     * Set the gender of the worker
     *
     * @param string $gender
     */
    public function setGender($gender);

    /**
     * Get the gender of the worker
     *
     * @return string
     */
    public function getGender();

    /**
     * Set the firstname of the worker
     *
     * @param string $firstname
     */
    public function setFirstname($firstname);

    /**
     * Get the firstname of the worker
     *
     * @return string
     */
    public function getFirstname();

    /**
     * Set the lastname of the worker
     *
     * @param string $lastname
     */
    public function setLastname($lastname);

    /**
     *Get the lastname of the worker
     *
     * @return string
     */
    public function getLastname();

    /**
     * Set the city of the worker
     *
     * @param string $city
     */
    public function setCity($city);

    /**
     * Get the city of the worker
     *
     * @return string
     */
    public function getCity();

    /**
     * Set the country of the worker
     *
     * @param string $country
     */
    public function setCountry($country);

    /**
     * Get the country of the worker
     *
     * @return string
     */
    public function getCountry();

    /**
     * Set the postcode of the worker
     *
     * @param string $postcode
     */
    public function setPostcode($postcode);

    /**
     * Get the postcode of the worker
     *
     * @return string
     */
    public function getPostcode();

    /**
     * Set the street of the worker
     *
     * @param string $street
     */
    public function setStreet($street);

    /**
     * Get the street of the worker
     *
     * @return string
     */
    public function getStreet();

    /**
     * Set the emails of the worker
     *
     * @param ArrayCollection $emails
     */
    public function setEmails(ArrayCollection $emails);

    /**
     * Get the emails of the worker
     *
     * @return ArrayCollection
     */
    public function getEmails();

    /**
     * Set the phones of the worker
     *
     * @param ArrayCollection $phones
     */
    public function setPhones(ArrayCollection $phones);

    /**
     * Get the phones of the worker
     *
     * @return ArrayCollection
     */
    public function getPhones();

    /**
     * Set the type of the worker
     *
     * @param mixed $type
     */
    public function setType($type);

    /**
     * Get the type of the worker
     *
     * @return mixed
     */
    public function getType();

    /**
     * Get the date when the worker arrived in the agency
     *
     * @param \DateTime $arrivedAt
     */
    public function setArrivedAt(\DateTime $arrivedAt = null);

    /**
     * Set the date when the worker arrived in the agency
     *
     * @return \DateTime
     */
    public function getArrivedAt();

    /**
     * Get the function of the worker
     *
     * @param string $function
     */
    public function setFunction($function);

    /**
     * Get the function of the worker
     *
     * @return string
     */
    public function getFunction();

    /**
     * Get the birthday of the worker
     *
     * @param \DateTime $birthday
     */
    public function setBirthday(\DateTime $birthday = null);

    /**
     * Get the birthday of the worker
     *
     * @return \DateTime
     */
    public function getBirthday();

    /**
     * Set the diploma of the worker
     *
     * @param string $diploma
     */
    public function setDiploma($diploma);

    /**
     * Get the diploma of the worker
     *
     * @return string
     */
    public function getDiploma();

    /**
     * Set the agency of the worker
     *
     * @param Agency $basedAt
     */
    public function setBasedAt(Agency $basedAt);

    /**
     * Get the worker of the worker
     *
     * @return mixed
     */
    public function getBasedAt();
}
