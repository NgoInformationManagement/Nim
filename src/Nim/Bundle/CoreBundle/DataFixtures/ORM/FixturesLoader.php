<?php

/*
 * This file is part of the Nim package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nim\Bundle\CoreBundle\DataFixtures\ORM;

use Faker\Factory as FakerFactory;
use Faker\Generator;
use Nelmio\Alice\Fixtures;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Hautelook\AliceBundle\Alice\DataFixtureLoader;

class FixturesLoader extends DataFixtureLoader
{
    protected $fixtureDir = '../../Resources/fixtures';

    /**
     * Container.
     *
     * @var ContainerInterface
     */
    protected $container;

    /**
     * Faker.
     *
     * @var Generator
     */
    protected $faker;

    public function __construct()
    {
        $this->faker = FakerFactory::create();
    }

    /**
     * {@inheritDoc}
     */
    protected function getFixtures()
    {
        return array(
            $this->getFixturePath('users.yml'),
            $this->getFixturePath('phones.yml'),
            $this->getFixturePath('emails.yml'),
            $this->getFixturePath('missions.yml'),
            $this->getFixturePath('mission_translations.yml'),
            $this->getFixturePath('agencies.yml'),
            $this->getFixturePath('passports.yml'),
            $this->getFixturePath('visas.yml'),
            $this->getFixturePath('contacts.yml'),
            $this->getFixturePath('vaccines.yml'),
            $this->getFixturePath('vaccine_translations.yml'),
            $this->getFixturePath('workers.yml'),
        );
    }

    /**
     * @param $filename
     * @return string
     */
    protected function getFixturePath($filename)
    {
        return sprintf('%s/%s', $this->getFixturesRoot(), $filename);
    }

    /**
     * @return string
     */
    protected function getDocumentPath()
    {
        return sprintf('%s/document', $this->getFixturesRoot());
    }

    /**
     * @return string
     */
    protected function getFixturesRoot()
    {
        return sprintf('%s/%s', __DIR__, $this->fixtureDir);
    }
}
