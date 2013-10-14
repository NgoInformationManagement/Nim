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

use Doctrine\Common\Collections\ArrayCollection;
use NIM\WorkerBundle\Model\Agency;
use NIM\WorkerBundle\Model\Contact;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class WorkerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('NIM\WorkerBundle\Model\Worker');
    }

    function it_has_no_id_by_default()
    {
        $this->getId()->shouldReturn(null);
    }

    function it_has_no_firstname_by_default()
    {
        $this->getFirstname()->shouldReturn(null);
    }

    function its_firstname_is_mutable()
    {
        $this->setFirstname('firstname');
        $this->getFirstname()->shouldReturn('firstname');
    }

    function it_has_no_lastname_by_default()
    {
        $this->getGender()->shouldReturn(null);
    }

    function its_lastname_is_mutable()
    {
        $this->setLastname('lastname');
        $this->getLastname()->shouldReturn('lastname');
    }

    function it_has_no_arrivedat_by_default()
    {
        $this->getArrivedAt()->shouldReturn(null);
    }

    function its_arrivedat_is_mutable(\DateTime $dateTime)
    {
        $this->setArrivedAt($dateTime);
        $this->getArrivedAt()->shouldReturn($dateTime);
    }

    function it_has_no_basedat_by_default()
    {
        $this->getBasedAt()->shouldReturn(null);
    }

    function its_basedat_is_mutable(Agency $agency)
    {
        $this->setBasedAt($agency);
        $this->getBasedAt()->shouldReturn($agency);
    }

    function it_has_no_birthday_by_default()
    {
        $this->getBirthday()->shouldReturn(null);
    }

    function its_birthday_is_mutable(\DateTime $dateTime)
    {
        $this->setBirthday($dateTime);
        $this->getBirthday()->shouldReturn($dateTime);
    }

    function it_has_no_contacts_by_default()
    {
        $this->getContacts()->shouldHaveType('Doctrine\Common\Collections\ArrayCollection');
    }

    function its_contacts_is_mutable(ArrayCollection $arrayCollection)
    {
        $this->setContacts($arrayCollection);
        $this->getContacts()->shouldReturn($arrayCollection);
    }

    function it_has_no_diploma_by_default()
    {
        $this->getDiploma()->shouldReturn(null);
    }

    function its_diploma_is_mutable()
    {
        $this->setDiploma('diploma');
        $this->getDiploma()->shouldReturn('diploma');
    }

    function it_has_no_function_by_default()
    {
        $this->getFunction()->shouldReturn(null);
    }

    function its_function_is_mutable()
    {
        $this->setFunction('function');
        $this->getFunction()->shouldReturn('function');
    }

    function it_has_no_gender_by_default()
    {
        $this->getGender()->shouldReturn(null);
    }

    function its_gender_is_mutable()
    {
        $this->setGender('gender');
        $this->getGender()->shouldReturn('gender');
    }

    function it_has_no_leftAt_by_default()
    {
        $this->getLeftAt()->shouldReturn(null);
    }

    function its_leftAt_is_mutable(\DateTime $dateTime)
    {
        $this->setLeftAt($dateTime);
        $this->getLeftAt()->shouldReturn($dateTime);
    }

    function it_has_no_updatedAt_by_default()
    {
        $this->getUpdatedAt()->shouldReturn(null);
    }

    function its_updatedAt_is_mutable(\DateTime $dateTime)
    {
        $this->setUpdatedAt($dateTime);
        $this->getUpdatedAt()->shouldReturn($dateTime);
    }

    function it_has_no_createdat_by_default()
    {
        $this->getCreatedAt()->shouldReturn(null);
    }

    function its_createdat_is_mutable(\DateTime $dateTime)
    {
        $this->setCreatedAt($dateTime);
        $this->getCreatedAt()->shouldReturn($dateTime);
    }
}
