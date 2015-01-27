<?php

/*
 * This file is part of the Nim package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Nim\Bundle\FormBundle\Model;

use Nim\Bundle\FormBundle\Model\Politeness;
use PhpSpec\ObjectBehavior;

class PolitenessSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Nim\Bundle\FormBundle\Model\Politeness');
    }

    public function it_should_return_gender_options()
    {
        $this::getOptions()->shouldReturn(array(
            Politeness::MADAM => 'politeness.'.Politeness::MADAM,
            Politeness::MISS => 'politeness.'.Politeness::MISS,
            Politeness::MISTER => 'politeness.'.Politeness::MISTER,
        ));
    }
}
