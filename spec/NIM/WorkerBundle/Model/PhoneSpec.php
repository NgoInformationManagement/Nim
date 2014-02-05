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

class PhoneSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NIM\WorkerBundle\Model\Phone');
    }

    public function it_should_implement_phone_interface()
    {
        $this->shouldHaveType('NIM\WorkerBundle\Model\Core\PhoneInterface');
    }

    public function it_has_no_id_by_default()
    {
        $this->getId()->shouldReturn(null);
    }

    public function it_has_no_type_by_default()
    {
        $this->getType()->shouldReturn(null);
    }

    public function its_type_is_mutable()
    {
        $this->setType('fax');
        $this->getType()->shouldReturn('fax');
    }

    public function it_has_no_number_by_default()
    {
        $this->getNumber()->shouldReturn(null);
    }

    public function its_number_is_mutable()
    {
        $this->setNumber('0559843929');
        $this->getNumber()->shouldReturn('0559843929');
    }

    public function it_has_no_createdat_by_default()
    {
        $this->getCreatedAt()->shouldReturn(null);
    }

    public function its_createdat_is_mutable(\DateTime $dateTime)
    {
        $this->setCreatedAt($dateTime);
        $this->getCreatedAt()->shouldReturn($dateTime);
    }

    public function it_has_no_updatedat_by_default()
    {
        $this->getUpdatedAt()->shouldReturn(null);
    }

    public function its_updatedat_is_mutable(\DateTime $dateTime)
    {
        $this->setUpdatedAt($dateTime);
        $this->getUpdatedAt()->shouldReturn($dateTime);
    }
}
