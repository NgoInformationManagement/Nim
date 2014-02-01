<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NIM\FormBundle\Behat;

use Behat\Mink\Exception\ElementNotFoundException;
use Behat\MinkExtension\Context\RawMinkContext;

class CollectionContext extends RawMinkContext
{
    /**
     * For example: I click "Add" to add an item to "Emails"
     *
     * @When /^(?:|I )(click|press) "([^"]*)" to add an item to "([^"]*)"$/
     */
    public function iaddCollectionItem($type, $buttonName, $collectionName)
    {
        $collectionSelector = sprintf(
            '*[contains(@data-form-type, "collection")]//legend[text()[contains(., "%s")]]',
            $collectionName
        );

        $this->addItem($collectionSelector, $buttonName, $type);
    }

    /**
     * Example : I delete the item #1 of the collection "Emails"
     *
     * @When /^(?:|I )delete the item #(\d+) of the collection "([^"]*)"$/
     */
    public function iDeleteCollectionItem($position, $collectionTitle)
    {
        $this->deleteItem(
            $this->getDefaultCollectionSelector($collectionTitle),
            $position
        );
    }

    /**
     * Example : I delete the first item of the collection "Emails"
     *
     * @When /^(?:|I )delete the first item of the collection "([^"]*)"$/
     */
    public function iDeleteFirstCollectionItem($collectionTitle)
    {
        $this->deleteItem(
            $this->getDefaultCollectionSelector($collectionTitle),
            1
        );
    }

    /**
     * Example : I fill in "Email" in the item #1 of the "Emails" collection with "arnaud@exemple.com"
     *
     * @When /^(?:|I )fill in "([^"]*)" in the item #(\d+) of the "([^"]*)" collection with "([^"]*)"$/
     */
    public function iFillField($fieldName, $position, $collectionTitle, $value)
    {
        $this->fillField(
            $this->getDefaultCollectionSelector($collectionTitle),
            $position,
            $fieldName,
            $value
        );
    }

    /**
     * Example : I fill in unnamed "Email" in the item #1 of the "Emails" collection with "arnaud@exemple.com"
     *
     * @When /^(?:|I )fill in unnamed "([^"]*)" in the item #(\d+) of the "([^"]*)" collection with "([^"]*)"$/
     */
    public function iFillUnnamedField($fieldName, $position, $collectionTitle, $value)
    {
        $this->fillField(
            $this->getDefaultCollectionSelector($collectionTitle),
            $position,
            $fieldName,
            $value,
            false
        );
    }

    /**
     * Example : I should see "Email" field error in the item #1 of the "Emails" collection
     *
     * @Then /^(?:|I )should see "([^"]*)" field error in the item #(\d+) of the "([^"]*)" collection$/
     */
    public function iShouldSeeInvalidField($field, $position, $collectionTitle)
    {
        $this->isInvalidField(
            $this->getDefaultCollectionSelector($collectionTitle),
            $position,
            $field
        );
    }

    /**
     * Example : I should see "Email" field error in the item #1 of the "Emails" collection
     *
     * @Then /^(?:|I )should see unnamed "([^"]*)" field error in the item #(\d+) of the "([^"]*)" collection$/
     */
    public function iShouldSeeInvalidUnnamedField($field, $position, $collectionTitle)
    {
        $this->isInvalidField(
            $this->getDefaultCollectionSelector($collectionTitle),
            $position,
            $field,
            false
        );
    }

    /**
     * Add an item of the collection type
     *
     * @param $collectionSelector
     * @param null   $buttonName
     * @param string $buttonType
     */
    public function addItem($collectionSelector, $buttonName = null, $buttonType = 'click')
    {
        $buttonSelector = null === $buttonName ? '' : sprintf('and text()[contains(., "%s")', $buttonName);

        $button = $this->findElement(
            sprintf(
                '//%s//*[contains(@data-form-collection, "add") %s]',
                $collectionSelector,
                $buttonSelector
            )
        );

        $button->$buttonType();
    }

    /**
     * Delete an item of the collection type
     *
     * @param $collectionSelector
     * @param $position
     * @param null   $buttonName
     * @param string $buttonType
     */
    public function deleteItem($collectionSelector, $position, $buttonName = null, $buttonType = 'click')
    {
        $buttonSelector = null === $buttonName ? '' : sprintf('and text()[contains(., "%s")', $buttonName);

        $button = $this->findElement(
            sprintf(
                '//%s/..//%s//*[contains(@data-form-collection, "delete") %s]',
                $collectionSelector,
                $this->getDefaultItemSelector($position),
                $buttonSelector
            )
        );

        $button->$buttonType();
    }

    /**
     * Check if the value of the field is invalid
     *
     * @param $collectionSelector
     * @param $position
     * @param $label
     * @param bool $useLabel
     */
    public function isInvalidField($collectionSelector, $position, $label = null, $useLabel = true)
    {
        if ($useLabel) {
            $fieldSelector = sprintf(
                '*[contains(@class, "error")]//label[text()[contains(., "%s")]]',
                $label
            );
        } else {
            $fieldSelector = sprintf('*[contains(@class, "error")]//*[contains(@name, "%s")]', strtolower($label));
        }

        $this->findElement(
            sprintf(
                '//%s/..//%s//%s',
                $collectionSelector,
                $this->getDefaultItemSelector($position),
                $fieldSelector
            )
        );
    }

    /**
     * Fill a collection form field
     *
     * @param string$collectionSelector
     * @param integer $position
     * @param string  $label
     * @param mixed   $value
     * @param bool    $useLabel
     */
    public function fillField($collectionSelector, $position, $label, $value, $useLabel = true)
    {
        if ($useLabel) {
            // It only work your the default collection type template
            $fieldSelector = sprintf('label[text()[contains(., "%s")]]/..//following::div/*[1]', $label);
        } else {
            $fieldSelector = sprintf('*[contains(@name, "%s")]', strtolower($label));
        }

        $field = $this->findElement(
            sprintf(
                '//%s/..//%s//%s',
                $collectionSelector,
                $this->getDefaultItemSelector($position),
                $fieldSelector
            )
        );

        $field->setValue($value);
    }

    /**
     * @param  string $collectionTitle
     * @return string
     */
    protected function getDefaultCollectionSelector($collectionTitle)
    {
        return sprintf(
            '*[contains(@data-form-type, "collection")]//legend[text()[contains(., "%s")]]',
            $collectionTitle
        );
    }

    /**
     * @param  string $position
     * @return string
     */
    protected function getDefaultItemSelector($position)
    {
        return sprintf(
            '*[contains(@data-form-collection, "item") and position()=%d]',
            $position
        );
    }

    /**
     * @param  string                                         $selector
     * @return \Behat\Mink\Element\NodeElement|null
     * @throws \Behat\Mink\Exception\ElementNotFoundException
     */
    protected function findElement($selector)
    {
        $field = $this->getSession()->getPage()->find('xpath', $selector);

        if (null === $field) {
            throw new ElementNotFoundException($this->getSession(), 'element', 'xpath', $selector);
        }

        return $field;
    }
}
