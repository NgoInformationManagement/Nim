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


trait FormCollectionTrait
{
    /**
     * For example: I click "Add" to add an item to "Email"
     *
     * @When /^I click "([^"]*)" to add an item to "([^"]*)"$/
     */
    public function iaddItemTo($button, $label)
    {
        $div = $this->getSession()->getPage()->find('css',
            sprintf('div.form-group:contains("%s")', $label)
        );

        if (null === $div) {
            throw new ExpectationException(
                sprintf('Collection field with "%s" as label does not exist', $label),
                $this->getSession()
            );
        }

        $locator = sprintf('button:contains("%s")', $button);

        if ($div->has('css', $locator)) {
            $div->find('css', $locator)->press();
        } else {
            $div->clickLink($button);
        }
    }

    /**
     * For example: I click "Delete" to delete the "1" item from "Email"
     *
     * @When /^I click "([^"]*)" to delete the "([0-9])" item from "([^"]*)"$/
     */
    public function ideleteItemTo($button, $nb, $label)
    {
        $div = $this->getSession()->getPage()->find('css',
            sprintf('div.form-group:contains("%s")', $label)
        );

        if (null === $div) {
            throw new ExpectationException(
                sprintf('Collection field with "%s" as label does not exist', $label),
                $this->getSession()
            );
        }

        // TODO : do not work
        $locator = sprintf('button:nth-child(%d)', $nb, $button);

        if ($div->has('css', $locator)) {
            $div->find('css', $locator)->press();
        } else {
            $div->clickLink($button);
        }
    }
}