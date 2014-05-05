<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\NIM\WorkerBundle\Model\Contactable;

use PhpSpec\ObjectBehavior;

class PhoneTypesSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NIM\WorkerBundle\Model\Contactable\PhoneTypes');
    }

    public function it_should_implement_constant_interface()
    {
        $this->shouldImplement('NIM\FormBundle\Model\ConstantInterface');
    }

    public function it_should_return_all_phone_types()
    {
        $this::getTypes('translationDomain')->shouldReturn(array(
            'phone' => 'translationDomain.phone',
            'cellphone' => 'translationDomain.cellphone' ,
            'fax' => 'translationDomain.fax'
        ));
    }
}
