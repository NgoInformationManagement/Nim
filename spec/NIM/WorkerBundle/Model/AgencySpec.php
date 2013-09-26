<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\NIM\WorkerBundle\Model;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Sylius\Bundle\AddressingBundle\Model\AddressInterface;

class AgencySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('NIM\WorkerBundle\Model\Agency');
    }

    function it_has_no_id_by_default()
    {
        $this->getId()->shouldReturn(null);
    }

    function it_has_no_name_by_default()
    {
        $this->getName()->shouldReturn(null);
    }

    function its_name_is_mutable()
    {
        $this->setName('name');
        $this->getName()->shouldReturn('name');
    }

    function it_has_no_city_by_default()
    {
        $this->getCity()->shouldReturn(null);
    }

    function its_city_is_mutable()
    {
        $this->setCity('city');
        $this->getCity()->shouldReturn('city');
    }

    function it_has_no_country_by_default()
    {
        $this->getCountry()->shouldReturn(null);
    }

    function its_country_is_mutable()
    {
        $this->setCountry('FR');
        $this->getCountry()->shouldReturn('FR');
    }

    function it_has_no_postcode_by_default()
    {
        $this->getPostcode()->shouldReturn(null);
    }

    function its_postcode_is_mutable()
    {
        $this->setPostcode('64000');
        $this->getPostcode()->shouldReturn('64000');
    }

    function it_has_no_street_by_default()
    {
        $this->getStreet()->shouldReturn(null);
    }

    function its_street_is_mutable()
    {
        $this->setStreet('street');
        $this->getStreet()->shouldReturn('street');
    }

    function its_fax_is_mutable()
    {
        $this->setFax('0545342312');
        $this->getFax()->shouldReturn('0545342312');
    }

    function it_has_no_fax_by_default()
    {
        $this->getFax()->shouldReturn(null);
    }

    function its_phonenumber_is_mutable()
    {
        $this->setPhoneNumber('0545342312');
        $this->getPhoneNumber()->shouldReturn('0545342312');
    }

    function it_has_no_phonenumber_by_default()
    {
        $this->getPhoneNumber()->shouldReturn(null);
    }

    function its_email_is_mutable()
    {
        $this->setEmail('email@email.fr');
        $this->getEmail()->shouldReturn('email@email.fr');
    }

    function it_has_no_email_by_default()
    {
        $this->getEmail()->shouldReturn(null);
    }

    function it_has_no_createdat_by_default()
    {
        $this->getCreatedAt()->shouldReturn(null);
    }

    function its_createdat_is_mutable()
    {
        $this->setCreatedAt('2001-01-01');
        $this->getCreatedAt()->shouldReturn('2001-01-01');
    }

    function it_has_no_updatedat_by_default()
    {
        $this->getUpdatedAt()->shouldReturn(null);
    }

    function its_updatedat_is_mutable()
    {
        $this->setUpdatedAt('2001-01-01');
        $this->getUpdatedAt()->shouldReturn('2001-01-01');
    }

}
