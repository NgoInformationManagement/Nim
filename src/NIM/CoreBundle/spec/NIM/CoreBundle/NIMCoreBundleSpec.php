<?php

namespace spec\NIM\CoreBundle;

use PhpSpec\ObjectBehavior;
use Sylius\Bundle\ResourceBundle\SyliusResourceBundle;

class NIMCoreBundleSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NIM\CoreBundle\NIMCoreBundle');
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
