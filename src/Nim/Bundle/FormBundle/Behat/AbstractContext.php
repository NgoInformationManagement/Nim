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

use Behat\Mink\Element\Element;
use Behat\Mink\Exception\ElementNotFoundException;
use Behat\MinkExtension\Context\RawMinkContext;

abstract class AbstractContext extends RawMinkContext
{
    /**
     * @param  string                                         $locator
     * @param  string                                         $selector
     * @param  Element                                        $container
     * @return \Behat\Mink\Element\NodeElement|null
     * @throws \Behat\Mink\Exception\ElementNotFoundException
     */
    protected function findElement($locator, $selector = 'xpath', Element $container = null)
    {

        if (null !== $container) {
            $field = $container->find($selector, $locator);
        } else {

            $field = $this->getSession()->getPage()->find($selector, $locator);
        }

        if (null === $field) {
            throw new ElementNotFoundException(
                $this->getSession(),
                'element',
                'xpath',
                $this->getSession()->getSelectorsHandler()->xpathLiteral($locator)
            );
        }

        return $field;
    }

    /**
     * @param  string                                         $locator
     * @param  Element                                        $container
     * @return \Behat\Mink\Element\NodeElement|null
     * @throws \Behat\Mink\Exception\ElementNotFoundException
     */
    protected function findField($locator, Element $container = null)
    {
        if (null !== $container) {
            $field = $container->findField($locator);
        } else {
            $field = $this->getSession()->getPage()->findField($locator);
        }

        if (null === $field) {
            throw new ElementNotFoundException(
                $this->getSession(),
                'element',
                'xpath',
                $this->getSession()->getSelectorsHandler()->xpathLiteral($locator)
            );
        }

        return $field;
    }

    /**
     * @param $locator
     * @param $value
     * @param Element $container
     */
    protected function fillInField($locator, $value, Element $container = null)
    {
        try {
            $field = $this->findField($locator, $container);
        } catch (ElementNotFoundException $e) {
            $field = $this->findElement(
                sprintf('//*[contains(@name, "%s")]', strtolower($locator)),
                'xpath',
                $container
            );
        }

        if ($field->getTagName() === 'select') {
            $field->selectOption($value);
        } else {
            $field->setValue($value);
        }
    }
}
