<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\NIM\FormBundle\Behat;

use Behat\Mink\Element\DocumentElement;
use Behat\Mink\Element\NodeElement;
use Behat\Mink\Mink;
use Behat\Mink\Session;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CollectionContextSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NIM\FormBundle\Behat\CollectionContext');
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
        $selector = '//*[contains(@data-form-type, "collection")]//legend[text()[contains(., "Emails")]]';
        $selector .= '//*[contains(@data-form-collection, "add") and text()[contains(., "Add Email")]';

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
        $selector = '//*[contains(@data-form-type, "collection")]//legend[text()[contains(., "Emails")]]/..';
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
        $selector = '//*[contains(@data-form-type, "collection")]//legend[text()[contains(., "Emails")]]/..';
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
        NodeElement $element
    )
    {
        $selector = '//*[contains(@data-form-type, "collection")]//legend[text()[contains(., "Emails")]]/..';
        $selector .= '//*[contains(@data-form-collection, "item") and position()=1]';
        $selector .= '//label[text()[contains(., "Email")]]/..//following::div/*[1]';

        $page->find('xpath', $selector)->willReturn($element)->shouldBeCalled();
        $session->getPage()->willReturn($page)->shouldBeCalled();
        $mink->getSession(Argument::any())->willReturn($session)->shouldBeCalled();
        $this->setMink($mink);

        $element->setValue('al@gmail.com')->shouldBeCalled();

        $this->iFillField('Email', 1,'Emails', 'al@gmail.com');
    }

    public function it_should_fill_the_unnamed_form_field(
        Mink $mink,
        Session $session,
        DocumentElement $page,
        NodeElement $element
    )
    {
        $selector = '//*[contains(@data-form-type, "collection")]//legend[text()[contains(., "Emails")]]/..';
        $selector .= '//*[contains(@data-form-collection, "item") and position()=1]';
        $selector .= '//*[contains(@name, "email")]';

        $page->find('xpath', $selector)->willReturn($element)->shouldBeCalled();
        $session->getPage()->willReturn($page)->shouldBeCalled();
        $mink->getSession(Argument::any())->willReturn($session)->shouldBeCalled();
        $this->setMink($mink);

        $element->setValue('al@gmail.com')->shouldBeCalled();

        $this->iFillUnnamedField('Email', 1,'Emails', 'al@gmail.com');
    }

    public function it_determine_if_the_field_is_not_valid(
        Mink $mink,
        Session $session,
        DocumentElement $page,
        NodeElement $element
    )
    {
        $selector = '//*[contains(@data-form-type, "collection")]//legend[text()[contains(., "Emails")]]/..';
        $selector .= '//*[contains(@data-form-collection, "item") and position()=1]';
        $selector .= '//*[contains(@class, "error")]//label[text()[contains(., "Address")]]';

        $page->find('xpath', $selector)->willReturn($element)->shouldBeCalled();
        $session->getPage()->willReturn($page)->shouldBeCalled();
        $mink->getSession(Argument::any())->willReturn($session)->shouldBeCalled();
        $this->setMink($mink);

        $this->iShouldSeeInvalidField('Address', 1, 'Emails');
    }

    public function it_determine_if_the_unnamed_field_is_not_valid(
        Mink $mink,
        Session $session,
        DocumentElement $page,
        NodeElement $element
    )
    {
        $selector = '//*[contains(@data-form-type, "collection")]//legend[text()[contains(., "Emails")]]/..';
        $selector .= '//*[contains(@data-form-collection, "item") and position()=1]';
        $selector .= '//*[contains(@class, "error")]//*[contains(@name, "address")]';

        $page->find('xpath', $selector)->willReturn($element)->shouldBeCalled();
        $session->getPage()->willReturn($page)->shouldBeCalled();
        $mink->getSession(Argument::any())->willReturn($session)->shouldBeCalled();
        $this->setMink($mink);

        $this->iShouldSeeInvalidUnnamedField('Address', 1, 'Emails');
    }

    public function it_should_add_item(
        Mink $mink,
        Session $session,
        DocumentElement $page,
        NodeElement $element
    )
    {
        $selector = '//collection//*[contains(@data-form-collection, "add") and text()[contains(., "button")]';

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
        $selector = '//collection/..//*[contains(@data-form-collection, "item") and position()=2]';
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

        $selector = '//collection/..//*[contains(@data-form-collection, "item") and position()=2]';
        $selector .= '//*[contains(@data-form-collection, "delete") ]';

        $page->find('xpath', $selector)->willReturn($element)->shouldBeCalled();
        $session->getPage()->willReturn($page)->shouldBeCalled();
        $mink->getSession(Argument::any())->willReturn($session)->shouldBeCalled();
        $this->setMink($mink);

        $this->deleteItem('collection', 2);
    }

    public function it_should_check_a_field(
        Mink $mink,
        Session $session,
        DocumentElement $page,
        NodeElement $element
    )
    {
        $selector = '//collection/..//*[contains(@data-form-collection, "item") and position()=2]';
        $selector .= '//*[contains(@class, "error")]//label[text()[contains(., "")]]';

        $page->find('xpath', $selector)->willReturn($element)->shouldBeCalled();
        $session->getPage()->willReturn($page)->shouldBeCalled();
        $mink->getSession(Argument::any())->willReturn($session)->shouldBeCalled();
        $this->setMink($mink);

        $this->isInvalidField('collection', 2);
    }

    public function it_should_check_a_unnamed_field(
        Mink $mink,
        Session $session,
        DocumentElement $page,
        NodeElement $element
    )
    {
        $selector = '//collection/..//*[contains(@data-form-collection, "item") and position()=2]';
        $selector .= '//*[contains(@class, "error")]//label[text()[contains(., "email")]]';

        $page->find('xpath', $selector)->willReturn($element)->shouldBeCalled();
        $session->getPage()->willReturn($page)->shouldBeCalled();
        $mink->getSession(Argument::any())->willReturn($session)->shouldBeCalled();
        $this->setMink($mink);

        $this->isInvalidField('collection', 2, 'email');
    }

    public function it_should_fill_field(
        Mink $mink,
        Session $session,
        DocumentElement $page,
        NodeElement $element
    )
    {
        $selector = '//collection/..//*[contains(@data-form-collection, "item") and position()=2]';
        $selector .= '//label[text()[contains(., "email")]]/..//following::div/*[1]';

        $page->find('xpath', $selector)->willReturn($element)->shouldBeCalled();
        $session->getPage()->willReturn($page)->shouldBeCalled();
        $mink->getSession(Argument::any())->willReturn($session)->shouldBeCalled();
        $this->setMink($mink);

        $this->fillField('collection', 2, 'email', 'al@gmail.com');
    }

    public function it_should_fill_unnamed_field(
        Mink $mink,
        Session $session,
        DocumentElement $page,
        NodeElement $element
    )
    {
        $selector = '//collection/..//*[contains(@data-form-collection, "item") and position()=2]';
        $selector .= '//*[contains(@name, "email")]';

        $page->find('xpath', $selector)->willReturn($element)->shouldBeCalled();
        $session->getPage()->willReturn($page)->shouldBeCalled();
        $mink->getSession(Argument::any())->willReturn($session)->shouldBeCalled();
        $this->setMink($mink);

        $this->fillField('collection', 2, 'email', 'al@gmail.com', false);
    }
}
