<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\NIM\FormBundle\Twig;

use PhpSpec\ObjectBehavior;

class CountryExtensionSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NIM\FormBundle\Twig\CountryExtension');
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
    }
}
