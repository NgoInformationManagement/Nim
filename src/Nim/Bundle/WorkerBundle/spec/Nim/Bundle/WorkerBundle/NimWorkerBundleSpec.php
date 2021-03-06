<?php

/*
 * This file is part of the Nim package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Nim\Bundle\WorkerBundle;

use PhpSpec\ObjectBehavior;
use Sylius\Bundle\ResourceBundle\SyliusResourceBundle;

class NimWorkerBundleSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Nim\Bundle\WorkerBundle\NimWorkerBundle');
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
