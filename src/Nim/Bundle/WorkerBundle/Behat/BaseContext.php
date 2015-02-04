<?php

/*
 * This file is part of the Nim package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nim\Bundle\WorkerBundle\Behat;

use Nim\Bundle\WorkerBundle\Model\Email;
use Nim\Bundle\WorkerBundle\Model\Phone;
use Nim\Component\Behat\BaseContext as Context;

class BaseContext extends Context
{
    /**
     * @param  array $phones
     * @param object $entity
     *
     * @return object
     */
    public function entityHasPhones(array $phones, $entity)
    {
        foreach ($phones as $number) {
            $phone = $this->thereIsPhone($number['type'], $number['number']);
            $entity->addPhone($phone);
        }

        return $this->persistAndFlush($entity);
    }

    /**
     * @param string $type
     * @param string $number
     *
     * @return Phone
     */
    public function thereIsPhone($type, $number)
    {
        $phone = new Phone();
        $this->setDataToObject($phone, array(
            'type' => $type,
            'number' => $number
        ));

        return $this->persistAndFlush($phone);
    }

    /**
     * @param  array $emails
     * @param  string $entity
     *
     * @return Email
     */
    public function entityHasEmails(array $emails, $entity)
    {
        foreach ($emails as $address) {
            $phone = $this->thereIsEmail($address['address']);
            $entity->addEmail($phone);
        }

        return $this->persistAndFlush($entity);
    }

    /**
     * @param string $address
     *
     * @return Email
     */
    public function thereIsEmail($address)
    {
        $email = new Email();
        $this->setDataToObject($email, array(
            'address' => $address
        ));

        return $this->persistAndFlush($email);
    }
}