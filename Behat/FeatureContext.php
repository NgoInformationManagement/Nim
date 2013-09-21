<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NIM\WebBundle\Behat;

use Faker\Factory as FakerFactory;
use Behat\Behat\Context\BehatContext;
use Behat\MinkExtension\Context\MinkDictionary;
use Behat\Symfony2Extension\Context\KernelDictionary;
use NIM\WebBundle\Behat\DataContext\BaseDataContext;
use NIM\WebBundle\Behat\DataContext\MissionDataContext;
use NIM\WebBundle\Behat\UserContext\AccountUserContext;
use NIM\WebBundle\Behat\UserContext\BaseUserContext;
use NIM\WebBundle\Behat\UserContext\MissionUserContext;

class FeatureContext extends BehatContext
{
    use MinkDictionary,
        KernelDictionary,
        BaseDataContext,
        BaseUserContext,
        MissionDataContext,
        AccountUserContext;

    /**
     * Faker.
     *
     * @var Generator
     */
    private $faker;

    private $parameters;

    /**
     * Initializes context with parameters from behat.yml.
     *
     * @param array $parameters
     */
    public function __construct(array $parameters)
    {
        $this->parameters = $parameters;
        $this->faker = FakerFactory::create(); // todo
    }

    /**
     * Get service by id.
     *
     * @param string $id
     * @return object
     */
    private function getService($id)
    {
        return $this->getContainer()->get($id);
    }
}
