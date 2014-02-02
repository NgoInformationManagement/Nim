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

interface ContactInterface
{
    /**
     * Set the firstname of the contact
     *
     * @param string $firstname
     */
    public function setFirstname($firstname);

    /**
     * Get the firstname of the contact
     *
     * @return string
     */
    public function getFirstname();

    /**
     * Set the lastname of the contact
     *
     * @param string $lastname
     */
    public function setLastname($lastname);

    /**
     *Get the lastname of the contact
     *
     * @return string
     */
    public function getLastname();

    /**
     * Set the city of the contact
     *
     * @param string $city
     */
    public function setCity($city);

    /**
     * Get the city of the contact
     *
     * @return string
     */
    public function getCity();

    /**
     * Set the country of the contact
     *
     * @param string $country
     */
    public function setCountry($country);

    /**
     * Get the country of the contact
     *
     * @return string
     */
    public function getCountry();

    /**
     * Set the postcode of the contact
     *
     * @param string $postcode
     */
    public function setPostcode($postcode);

    /**
     * Get the postcode of the contact
     *
     * @return string
     */
    public function getPostcode();

    /**
     * Set the street of the contact
     *
     * @param string $street
     */
    public function setStreet($street);

    /**
     * Get the street of the contact
     *
     * @return string
     */
    public function getStreet();

    /**
     * Set the emails of the contact
     *
     * @param ArrayCollection $emails
     */
    public function setEmails(ArrayCollection $emails);

    /**
     * Get the emails of the contact
     *
     * @return ArrayCollection
     */
    public function getEmails();

    /**
     * Set the phones of the contact
     *
     * @param ArrayCollection $phones
     */
    public function setPhones(ArrayCollection $phones);

    /**
     * Get the phones of the contact
     *
     * @return ArrayCollection
     */
    public function getPhones();
}
