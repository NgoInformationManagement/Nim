<?php

/*
 * This file is part of the Nim package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Nim\Bundle\FormBundle\Behat;

use Behat\Mink\Element\DocumentElement;
use Behat\Mink\Element\NodeElement;
use Behat\Mink\Mink;
use Behat\Mink\Selector\SelectorsHandler;
use Behat\Mink\Session;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CollectionContextSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Nim\Bundle\FormBundle\Behat\CollectionContext');
    }

    public function it_should_extends_Mink_behat_context()
    {
        $this->shouldHaveType('Behat\MinkExtension\Context\RawMinkContext');
    }

    public function it_should_add_item_to_collection(
        Mink $mink,
        Session $session,
        DocumentElement $page,
        NodeElement $element
    )
    {
        $selector = '//*[contains(@data-form-type, "collection")]//*[text()[contains(., "Emails")]]';
        $selector .= '//*[contains(@data-form-collection, "add") and text()[contains(., "Add Email")]]';

        $page->find('xpath', $selector)->willReturn($element)->shouldBeCalled();
        $session->getPage()->willReturn($page)->shouldBeCalled();
        $mink->getSession(Argument::any())->willReturn($session)->shouldBeCalled();
        $this->setMink($mink);

        $element->click()->shouldBeCalled();

        $this->iaddCollectionItem('click', 'Add Email', 'Emails');
    }

    public function it_should_delete_item_form_the_collection(
        Mink $mink,
        Session $session,
        DocumentElement $page,
        NodeElement $element
    )
    {
        $selector = '//*[@data-form-type="collection"]//*[text()[contains(., "Emails")]]/..';
        $selector .= '//*[contains(@data-form-collection, "item") and position()=2]';
        $selector .= '//*[contains(@data-form-collection, "delete") ]';

        $page->find('xpath', $selector)->willReturn($element)->shouldBeCalled();
        $session->getPage()->willReturn($page)->shouldBeCalled();
        $mink->getSession(Argument::any())->willReturn($session)->shouldBeCalled();
        $this->setMink($mink);

        $element->click()->shouldBeCalled();

        $this->iDeleteCollectionItem(2, 'Emails');
    }

    public function it_should_delete_the_first_item_form_the_collection(
        Mink $mink,
        Session $session,
        DocumentElement $page,
        NodeElement $element
    )
    {
        $selector = '//*[@data-form-type="collection"]//*[text()[contains(., "Emails")]]/..';
        $selector .= '//*[contains(@data-form-collection, "item") and position()=1]';
        $selector .= '//*[contains(@data-form-collection, "delete") ]';

        $page->find('xpath', $selector)->willReturn($element)->shouldBeCalled();
        $session->getPage()->willReturn($page)->shouldBeCalled();
        $mink->getSession(Argument::any())->willReturn($session)->shouldBeCalled();
        $this->setMink($mink);

        $element->click()->shouldBeCalled();

        $this->iDeleteFirstCollectionItem('Emails');
    }

    public function it_should_fill_the_form_field(
        Mink $mink,
        Session $session,
        DocumentElement $page,
        NodeElement $container,
        NodeElement $field
    )
    {
        $selector = '//*[@data-form-type="collection"]//*[text()[contains(., "Emails")]]/..';
        $selector .= '//*[contains(@data-form-collection, "item") and position()=1]';
        $page->find('xpath', $selector)->willReturn($container)->shouldBeCalled();

        $container->findField("Email")->willReturn($field)->shouldBeCalled();
        $field->getTagName()->willReturn('select')->shouldBeCalled();
        $field->selectOption('al@gmail.com')->shouldBeCalled();

        $session->getPage()->willReturn($page)->shouldBeCalled();
        $mink->getSession(Argument::any())->willReturn($session)->shouldBeCalled();
        $this->setMink($mink);

        $this->iFillField('Email', 1,'Emails', 'al@gmail.com');
    }

    public function it_determine_if_the_field_is_not_valid(
        Mink $mink,
        Session $session,
        DocumentElement $page,
        NodeElement $element,
        SelectorsHandler $selectorHandler
    )
    {
        $selector = '//*[@data-form-type="collection"]//*[text()[contains(., "Emails")]]/..';
        $selector .= '//*[contains(@data-form-collection, "item") and position()=1]';
        $selector .= '//*[contains(@class, "has-error")]//*[contains(@name, "address")]';
        $page->find('xpath', $selector)->willReturn(null)->shouldBeCalled();

        $selector = '//*[@data-form-type="collection"]//*[text()[contains(., "Emails")]]/..';
        $selector .= '//*[contains(@data-form-collection, "item") and position()=1]';
        $selector .= '//*[contains(@class, "has-error")]//label[text()[contains(., "Address")]]';
        $page->find('xpath', $selector)->willReturn($element)->shouldBeCalled();

        $session->getPage()->willReturn($page)->shouldBeCalled();
        $session->getSelectorsHandler()->willReturn($selectorHandler)->shouldBeCalled();
        $mink->getSession(Argument::any())->willReturn($session)->shouldBeCalled();
        $this->setMink($mink);

        $this->iShouldSeeInvalidField('Address', 1, 'Emails');
    }

    public function it_should_add_item(
        Mink $mink,
        Session $session,
        DocumentElement $page,
        NodeElement $element
    )
    {
        $selector = '//collection//*[contains(@data-form-collection, "add") and text()[contains(., "button")]]';

        $page->find('xpath', $selector)->willReturn($element)->shouldBeCalled();
        $session->getPage()->willReturn($page)->shouldBeCalled();
        $mink->getSession(Argument::any())->willReturn($session)->shouldBeCalled();
        $this->setMink($mink);

        $this->addItem('collection', 'button');
    }

    public function it_should_add_item_with_a_button_without_name(
        Mink $mink,
        Session $session,
        DocumentElement $page,
        NodeElement $element
    )
    {
        $selector = '//collection//*[contains(@data-form-collection, "add") ]';

        $page->find('xpath', $selector)->willReturn($element)->shouldBeCalled();
        $session->getPage()->willReturn($page)->shouldBeCalled();
        $mink->getSession(Argument::any())->willReturn($session)->shouldBeCalled();
        $this->setMink($mink);

        $this->addItem('collection');
    }

    public function it_should_delete_item(
        Mink $mink,
        Session $session,
        DocumentElement $page,
        NodeElement $element
    )
    {
        $selector = '//collection//*[contains(@data-form-collection, "item") and position()=2]';
        $selector .= '//*[contains(@data-form-collection, "delete") and text()[contains(., "button")]';

        $page->find('xpath', $selector)->willReturn($element)->shouldBeCalled();
        $session->getPage()->willReturn($page)->shouldBeCalled();
        $mink->getSession(Argument::any())->willReturn($session)->shouldBeCalled();
        $this->setMink($mink);

        $this->deleteItem('collection', 2, 'button');
    }

    public function it_should_delete_item_with_a_button_without_name(
        Mink $mink,
        Session $session,
        DocumentElement $page,
        NodeElement $element
    )
    {

        $selector = '//collection//*[contains(@data-form-collection, "item") and position()=2]';
        $selector .= '//*[contains(@data-form-collection, "delete") ]';

        $page->find('xpath', $selector)->willReturn($element)->shouldBeCalled();
        $session->getPage()->willReturn($page)->shouldBeCalled();
        $mink->getSession(Argument::any())->willReturn($session)->shouldBeCalled();
        $this->setMink($mink);

        $this->deleteItem('collection', 2);
    }

    public function it_should_find_error_on_field_which_has_not_label(
        Mink $mink,
        Session $session,
        DocumentElement $page,
        NodeElement $element
    )
    {
        $selector = '//collection//*[contains(@data-form-collection, "item") and position()=2]';
        $selector .= '//*[contains(@class, "has-error")]//*[contains(@name, "name")]';

        $page->find('xpath', $selector)->willReturn($element)->shouldBeCalled();
        $session->getPage()->willReturn($page)->shouldBeCalled();
        $mink->getSession(Argument::any())->willReturn($session)->shouldBeCalled();
        $this->setMink($mink);

        $this->isInvalidField('collection', 2, 'Name');
    }

    public function it_should_find_error_on_field_which_has_a_label(
        Mink $mink,
        Session $session,
        DocumentElement $page,
        NodeElement $element,
        SelectorsHandler $selectorHandler
    )
    {
        $selector = '//collection//*[contains(@data-form-collection, "item") and position()=2]';
        $selector .= '//*[contains(@class, "has-error")]//*[contains(@name, "name")]';
        $page->find('xpath', $selector)->willReturn(null)->shouldBeCalled();

        $selector = '//collection//*[contains(@data-form-collection, "item") and position()=2]';
        $selector .= '//*[contains(@class, "has-error")]//label[text()[contains(., "Name")]]';
        $page->find('xpath', $selector)->willReturn($element)->shouldBeCalled();

        $session->getPage()->willReturn($page)->shouldBeCalled();
        $session->getSelectorsHandler()->willReturn($selectorHandler)->shouldBeCalled();
        $mink->getSession(Argument::any())->willReturn($session)->shouldBeCalled();
        $this->setMink($mink);

        $this->isInvalidField('collection', 2, 'Name');
    }

    public function it_should_select_a_option_from_a_combo_box(
        Mink $mink,
        Session $session,
        DocumentElement $page,
        NodeElement $container,
        NodeElement $field
    )
    {
        $selector = '//collection//*[contains(@data-form-collection, "item") and position()=2]';
        $page->find('xpath', $selector)->willReturn($container)->shouldBeCalled();

        $container->findField("Email")->willReturn($field)->shouldBeCalled();
        $field->getTagName()->willReturn('select')->shouldBeCalled();
        $field->selectOption('al@gmail.com')->shouldBeCalled();

        $session->getPage()->willReturn($page)->shouldBeCalled();
        $mink->getSession(Argument::any())->willReturn($session)->shouldBeCalled();
        $this->setMink($mink);

        $this->fillField('collection', 2, 'Email', 'al@gmail.com');
    }

    public function it_should_fill_input(
        Mink $mink,
        Session $session,
        DocumentElement $page,
        NodeElement $container,
        NodeElement $field
    )
    {
        $selector = '//collection//*[contains(@data-form-collection, "item") and position()=2]';
        $page->find('xpath', $selector)->willReturn($container)->shouldBeCalled();

        $container->findField("Email")->willReturn($field)->shouldBeCalled();
        $field->getTagName()->willReturn('input')->shouldBeCalled();
        $field->setValue('al@gmail.com')->shouldBeCalled();

        $session->getPage()->willReturn($page)->shouldBeCalled();
        $mink->getSession(Argument::any())->willReturn($session)->shouldBeCalled();
        $this->setMink($mink);

        $this->fillField('collection', 2, 'Email', 'al@gmail.com');
    }
}
