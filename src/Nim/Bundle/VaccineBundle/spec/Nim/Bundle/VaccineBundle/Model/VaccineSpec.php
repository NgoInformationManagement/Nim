<?php

/*
 * This file is part of the Nim package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Nim\Bundle\VaccineBundle\Model;

use PhpSpec\ObjectBehavior;

class VaccineSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Nim\Bundle\VaccineBundle\Model\Vaccine');
    }

    public function it_should_implement_gedmo_interface_translable()
    {
        $this->shouldImplement('\Gedmo\Translatable\Translatable');
    }

    public function it_should_implement_entity_form_type_interface()
    {
        $this->shouldImplement('Nim\Bundle\FormBundle\Model\Core\EntityFormTypeInterface');
    }

    public function it_has_no_id_by_default()
    {
        $this->getId()->shouldReturn(null);
    }

    public function it_has_no_title_by_default()
    {
        $this->getTitle()->shouldReturn(null);
    }

    public function its_title_is_mutable()
    {
        $this->setTitle('title');
        $this->getTitle()->shouldReturn('title');
    }

    public function it_has_no_description_by_default()
    {
        $this->getDescription()->shouldReturn(null);
    }

    public function its_description_is_mutable()
    {
        $this->setDescription('desciption');
        $this->getDescription()->shouldReturn('desciption');
    }

}
