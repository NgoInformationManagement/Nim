<?php

/*
 * This file is part of the Nim package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Nim\Bundle\WorkerBundle\Model;

use PhpSpec\ObjectBehavior;

class EmailSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Nim\Bundle\WorkerBundle\Model\Email');
    }

    public function it_should_implement_email_interface()
    {
        $this->shouldHaveType('Nim\Bundle\WorkerBundle\Model\EmailInterface');
    }

    public function it_has_no_id_by_default()
    {
        $this->getId()->shouldReturn(null);
    }

    public function it_has_no_address_by_default()
    {
        $this->getAddress()->shouldReturn(null);
    }

    public function its_address_is_mutable()
    {
        $this->setAddress('address');
        $this->getAddress()->shouldReturn('address');
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
