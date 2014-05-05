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

class VisaSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NIM\WorkerBundle\Model\Visa');
    }

    public function it_should_implement_worker_interface()
    {
        $this->shouldHaveType('NIM\WorkerBundle\Model\VisaInterface');
    }

    public function it_has_no_id_by_default()
    {
        $this->getId()->shouldReturn(null);
    }

    public function it_has_no_country_by_default()
    {
        $this->getCountry()->shouldReturn(null);
    }

    public function its_country_is_mutable()
    {
        $this->setCountry('country');
        $this->getCountry()->shouldReturn('country');
    }

    public function it_has_no_startedat_by_default()
    {
        $this->getStartedat()->shouldReturn(null);
    }

    public function its_startedat_is_mutable(\DateTime $dateTime)
    {
        $this->setStartedat($dateTime);
        $this->getStartedat()->shouldReturn($dateTime);
    }

    public function it_has_no_length_by_default()
    {
        $this->getLength()->shouldReturn(null);
    }

    public function its_length_is_mutable()
    {
        $this->setLength(1);
        $this->getLength()->shouldReturn(1);
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
