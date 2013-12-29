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

use Behat\Mink\Element\NodeElement;
use Behat\Mink\Exception\ExpectationException;

trait FormCollectionTrait
{
    /**
     * For example: I click "Add" to add an item to "Email"
     *
     * @When /^I (click|press) "([^"]*)" to add an item to "([^"]*)"$/
     */
    public function iaddItemTo($type, $button, $label)
    {
        $buttons = $this->getSession()->getPage()->findAll('xpath',
            sprintf(
                '//div[contains(@data-form-type, "collection")]//legend[text()[contains(., "%s")]]//*[text()[contains(., "%s")] and contains(@data-form-collection, "add")]',
                $label, $button
            )
        );

        foreach ($buttons as $button) {
            if ($button->isVisible()) {
                if ($type == 'click') {
                    $button->click();
                } else {
                    $button->press();
                }
            }
        }
    }

    /**
     * @Then /^I should see "([^"]*)" field error in the item #(\d+) of the "([^"]*)" collection$/
     */
    public function iShouldSeeFieldErrorInTheCollection($fieldLabel, $position, $collectionLabel)
    {
        $fieldset = $this->getCollectionContainer($collectionLabel);
        $fieldLabel = $this->getLabelOfCollectionField($fieldLabel, $position);

        $this->assertSession()->elementExists(
            'xpath',
            sprintf("//div[contains(@class, 'error')]//*[contains(@id, '%s')]", $fieldLabel),
            $fieldset
        );
    }

    /**
     * @When /^I fill in "([^"]*)" in the item #(\d+) of the "([^"]*)" collection with "([^"]*)"$/
     */
    public function iFillFieldInTheCollectionWith($fieldLabel, $position, $collectionLabel, $value, $container = null)
    {
        $fieldset = $this->getCollectionContainer($collectionLabel, $container);
        $fieldLabel = $this->getLabelOfCollectionField($fieldLabel, $position);

        $field = $fieldset->find(
            'xpath',
            sprintf("//div[contains(@data-form-collection, 'list')]//*[contains(@id, '%s')]", $fieldLabel)
        );

        if (null === $field) {
            throw new ExpectationException(
                sprintf('Collection named %s has not a field named %s', $collectionLabel, $fieldLabel),
                $this->getSession()
            );
        }

        $field->setValue($value);
    }

    /**
     * @When /^I delete the item #(\d+) of the collection "([^"]*)"$/
     */
    public function iDeleteTheItemOfTheCollection($position = 1, $collectionLabel)
    {
        $fieldset = $this->getCollectionContainer($collectionLabel);

        $field = $fieldset->find(
            'xpath',
            sprintf(
                "//div[contains(@data-form-collection, 'item') and position()=%d]//a[contains(@data-form-collection, 'delete')]",
                $position
            )
        );

        if (null === $field) {
            throw new ExpectationException(
                sprintf(
                    'Collection named %s has not deletion button',
                    $collectionLabel
                ),
                $this->getSession()
            );
        }

        $field->click();
    }

    /**
     * For example: I click "Add" to add an item in current tab
     *
     * @When /^I click "([^"]*)" to add an item in current tab$/
     */
    public function iaddItemToTab($button)
    {
        $div = $this->getSession()->getPage()->find('css',
            '.tab-pane.active div[data-form-type="collection"]'
        );

        if (null === $div) {
            throw new ExpectationException(
                'Collection is not found in the current tab',
                $this->getSession()
            );
        }

        $this->iClickButtonIn($div, $button);
    }

    /**
     * @param $div
     * @param $button
     */
    private function iClickButtonIn(NodeElement $div, $button)
    {
        $locator = sprintf('button:contains("%s")', $button);

        if ($div->has('css', $locator)) {
            $div->find('css', $locator)->press();
        } else {
            $div->clickLink($button);
        }
    }

    /**
     * @param $fieldLabel
     * @param $position
     * @return string
     */
    private function getLabelOfCollectionField($fieldLabel, $position)
    {
        return sprintf('%d_%s', $position - 1, strtolower($fieldLabel));
    }

    /**
     * @param $collectionLabel
     * @return mixed
     */
    private function getCollectionContainer($collectionLabel)
    {
        $fieldsets = $this->getSession()->getPage()->findAll(
            'xpath',
            sprintf("//legend[text()[contains(., '%s')]]/..", $collectionLabel)
        );

        foreach ($fieldsets as $fieldset) {
            if ($fieldset->isVisible() && null !== $fieldset) {
                return $fieldset;
            }
        }

        throw new ExpectationException(
            sprintf('Collection named %s does not exist', $collectionLabel),
            $this->getSession()
        );
    }
}
