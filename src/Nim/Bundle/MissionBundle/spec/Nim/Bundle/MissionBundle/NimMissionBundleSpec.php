<?php

/*
 * This file is part of the Nim package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Nim\Bundle\MissionBundle;

use PhpSpec\ObjectBehavior;
use Sylius\Bundle\ResourceBundle\SyliusResourceBundle;

class NimMissionBundleSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Nim\Bundle\MissionBundle\NimMissionBundle');
    }

    public function it_is_bundle()
    {
        $this->shouldHaveType('Sylius\Bundle\ResourceBundle\AbstractResourceBundle');
    }

    public function it_support_driver()
    {
        $this::getSupportedDrivers()->shouldReturn(array(
            SyliusResourceBundle::DRIVER_DOCTRINE_ORM,
        ));
    }
}
