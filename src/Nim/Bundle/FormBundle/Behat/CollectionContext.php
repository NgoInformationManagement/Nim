<?php

/*
 * This file is part of the Nim package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nim\Bundle\FormBundle\Behat;

use Behat\Mink\Exception\ElementNotFoundException;

class CollectionContext extends AbstractContext
{
    /**
     * For example: I click "Add" to add an item to "Emails"
     *
     * @When /^(?:|I )(click|press) "([^"]*)" to add an item to "([^"]*)"$/
     */
    public function iaddCollectionItem($type, $buttonName, $collectionName)
    {
        $collectionSelector = sprintf(
            '*[contains(@data-form-type, "collection")]//*[text()[contains(., "%s")]]',
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
     * Add an item of the collection type
     *
     * @param $collectionSelector
     * @param null   $buttonName
     * @param string $buttonType
     */
    public function addItem($collectionSelector, $buttonName = null, $buttonType = 'click')
    {
        $buttonSelector = null === $buttonName ? '' : sprintf('and text()[contains(., "%s")]', $buttonName);

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
                '//%s//%s//*[contains(@data-form-collection, "delete") %s]',
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
     * @return \Behat\Mink\Element\NodeElement|null
     */
    public function isInvalidField($collectionSelector, $position, $label)
    {
        try {
            return $this->findElement(
                sprintf(
                    '//%s//%s//%s',
                    $collectionSelector,
                    $this->getDefaultItemSelector($position),
                    sprintf('*[contains(@class, "has-error")]//*[contains(@name, "%s")]', strtolower($label))
                )
            );
        } catch (ElementNotFoundException $e) {
            return $this->findElement(
                sprintf(
                    '//%s//%s//%s',
                    $collectionSelector,
                    $this->getDefaultItemSelector($position),
                    sprintf('*[contains(@class, "has-error")]//label[text()[contains(., "%s")]]', $label)
                )
            );
        }
    }

    /**
     * Fill a collection form field
     *
     * @param string  $collectionSelector
     * @param integer $position
     * @param string  $field
     * @param mixed   $value
     */
    public function fillField($collectionSelector, $position, $field, $value)
    {
        $collectionElement = $this->findElement(
            sprintf(
                '//%s//%s',
                $collectionSelector,
                $this->getDefaultItemSelector($position)
            )
        );

        $this->fillInField($field, $value, $collectionElement);
    }

    /**
     * @param  string $collectionTitle
     * @return string
     */
    protected function getDefaultCollectionSelector($collectionTitle)
    {
        return sprintf(
            '*[@data-form-type="collection"]//*[text()[contains(., "%s")]]/..',
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
}
