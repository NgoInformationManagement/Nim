<?php

namespace spec\Nim\Bundle\FormBundle\Form\Extension\Type;

use PhpSpec\ObjectBehavior;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\Test\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TextTypeExtensionSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Nim\Bundle\FormBundle\Form\Extension\Type\TextTypeExtension');
    }

    public function it_should_extends_abstract_type_extension()
    {
        $this->shouldHaveType('Symfony\Component\Form\AbstractTypeExtension');
    }

    public function it_should_build_the_view_by_default(FormView $view, FormInterface $form)
    {
        $this->buildView($view, $form, array());
    }
    public function it_should_configure_the_resolver(OptionsResolverInterface $resolver)
    {
        $resolver->setOptional(array(
            'placeholder'
        ))->shouldBeCalled();

        $resolver->setAllowedTypes(array(
            'placeholder' => array('string'),
        ))->shouldBeCalled();

        $this->setDefaultOptions($resolver);
    }

    public function it_should_have_collection_as_extended_type()
    {
        $this->getExtendedType()->shouldReturn('text');
    }
}
