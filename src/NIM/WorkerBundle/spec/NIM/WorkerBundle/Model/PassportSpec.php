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

class PassportSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NIM\WorkerBundle\Model\Passport');
    }

    public function it_should_implement_worker_interface()
    {
        $this->shouldHaveType('NIM\WorkerBundle\Model\PassportInterface');
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

    public function it_has_no_date_of_expiry_by_default()
    {
        $this->getDateOfExpiry()->shouldReturn(null);
    }

    public function its_date_of_expiry_is_mutable(\DateTime $datetime)
    {
        $this->setDateOfExpiry($datetime);
        $this->getDateOfExpiry()->shouldReturn($datetime);
    }

    public function it_has_no_date_of_issue_by_default()
    {
        $this->getDateOfIssue()->shouldReturn(null);
    }

    public function its_date_of_issue_is_mutable(\DateTime $datetime)
    {
        $this->setDateOfIssue($datetime);
        $this->getDateOfIssue()->shouldReturn($datetime);
    }

    public function it_has_no_number_by_default()
    {
        $this->getNumber()->shouldReturn(null);
    }

    public function its_number_is_mutable(\DateTime $datetime)
    {
        $this->setNumber($datetime);
        $this->getNumber()->shouldReturn($datetime);
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
