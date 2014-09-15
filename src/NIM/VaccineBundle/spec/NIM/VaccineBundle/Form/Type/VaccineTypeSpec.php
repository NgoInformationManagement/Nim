<?php

namespace spec\NIM\VaccineBundle\Form\Type;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class VaccineTypeSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('VacineBundle\Model\Vacine');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType('NIM\VaccineBundle\Form\Type\VaccineType');
    }

    public function it_should_build_mission_form(FormBuilderInterface $builder)
    {
        $builder
            ->add('translations', 'a2lix_translations_gedmo',  Argument::any())
            ->shouldBeCalled()
            ->willReturn($builder)
        ;

        $this->buildForm($builder, array());
    }

    public function it_should_define_assigned_data_class(OptionsResolverInterface $resolver)
    {
        $this->setValidationGroups(array('nim'));
        $this->setDataClass('vaccine');

        $resolver->setDefaults(array(
            'data_class' => 'vaccine',
            'validation_groups' => array('nim')
        ))->shouldBeCalled();

        $this->setDefaultOptions($resolver);
    }

    public function it_should_have_valid_name()
    {
        $this->getName()->shouldReturn('nim_vaccine');
    }
}
