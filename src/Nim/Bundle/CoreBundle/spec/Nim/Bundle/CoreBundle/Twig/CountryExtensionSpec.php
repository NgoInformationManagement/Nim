<?php

/*
 * This file is part of the Nim package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Nim\Bundle\CoreBundle\Twig;

use PhpSpec\ObjectBehavior;

class CountryExtensionSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Nim\Bundle\CoreBundle\Twig\CountryExtension');
    }

    public function it_should_define_filter()
    {
        $this->getFilters()->shouldBeArray();
    }

    public function it_should_have_name()
    {
        $this->getName()->shouldReturn('nim_country');
    }

    public function it_should_return_country()
    {
        $this->countryFilter('US', 'fr')->shouldReturn('États-Unis');
        $this->countryFilter('US', 'en')->shouldReturn('United States');
    }
}
