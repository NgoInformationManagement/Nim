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
use Sylius\Component\Resource\Model\SoftDeletableInterface;
use Sylius\Component\Resource\Model\TimestampableInterface;

interface AgencyInterface extends TimestampableInterface, SoftDeletableInterface
{
    /**
     * Set the city of the agency
     *
     * @param string $city
     */
    public function setCity($city);

    /**
     * Get the city of the agency
     *
     * @return string
     */
    public function getCity();

    /**
     * Set the country of the agency
     *
     * @param string $country
     */
    public function setCountry($country);

    /**
     * Get the country of the agency
     *
     * @return string
     */
    public function getCountry();

    /**
     * Set the postcode of the agency
     *
     * @param string $postcode
     */
    public function setPostcode($postcode);

    /**
     * Get the postcode of the agency
     *
     * @return string
     */
    public function getPostcode();

    /**
     * Set the street of the agency
     *
     * @param string $street
     */
    public function setStreet($street);

    /**
     * Get the street of the agency
     *
     * @return string
     */
    public function getStreet();

    /**
     * Set the emails of the agency
     *
     * @param ArrayCollection $emails
     */
    public function setEmails(ArrayCollection $emails);

    /**
     * Get the emails of the agency
     *
     * @return ArrayCollection
     */
    public function getEmails();

    /**
     * Set the phones of the agency
     *
     * @param ArrayCollection $phones
     */
    public function setPhones(ArrayCollection $phones);

    /**
     * Get the phones of the agency
     *
     * @return ArrayCollection
     */
    public function getPhones();
}
