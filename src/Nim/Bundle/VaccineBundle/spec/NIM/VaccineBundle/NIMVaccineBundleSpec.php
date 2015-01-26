<?php

namespace spec\Nim\Bundle\VaccineBundle;

use PhpSpec\ObjectBehavior;
use Sylius\Bundle\ResourceBundle\SyliusResourceBundle;

class NimVaccineBundleSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Nim\Bundle\VaccineBundle\NimVaccineBundle');
    }

    public function it_is_bundle()
    {
        $this->shouldHaveType('Sylius\Bundle\ResourceBundle\AbstractResourceBundle');
    }

    public function it_support_driver()
    {
        $this::getSupportedDrivers()->shouldReturn(array(
            SyliusResourceBundle::DRIVER_DOCTRINE_ORM
        ));
    }
}