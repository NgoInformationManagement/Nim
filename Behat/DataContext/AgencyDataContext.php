<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NIM\WebBundle\Behat\DataContext;

use Behat\Gherkin\Node\TableNode;
use NIM\WorkerBundle\Model\Agency;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

trait AgencyDataContext
{
    /**
     * @Given /^There are following agencies:$/
     */
    public function thereAreFollowingAgencies(TableNode $table)
    {
        foreach ($table->getHash() as $data) {
            $this->thereIsAgency($data['name'], $data);
        }
    }

    /**
     * @Given /^There is agency "([^""]*)"$/
     */
    public function thereIsAgency($name, array $additionalData = array())
    {
        /** @var Agency $agency */
        $agency = $this->getAgencyRepository()->createNew();
        $agency->setName($name);

        if (count($additionalData) > 0) {
            $this->setDataToObject($agency, $additionalData);
        }

        $this->persistAndFlush($agency);
    }

    /**
     * @Given /^I created agency "([^""]*)"$/
     */
    public function iCreatedAgency($name)
    {
        $this->thereIsAgency($name, array(
            'street' => 'street',
            'city' => 'city',
            'postcode' => 'postcode',
            'country' => 'country',
            'phoneNumber' => 'phoneNumber',
            'fax' => 'fax',
            'email' => 'email@gmail.com'
        ));
    }

    /**
     * Get agency resource
     *
     * @param $title
     * @return Agency
     */
    private function getAgencyByName($name)
    {
        return $this->getAgencyRepository()->findOneBy(array('name' => $name));
    }

    /**
     * @return EntityRepository
     */
    private function getAgencyRepository()
    {
        return $this->getRepository('agency');
    }
}