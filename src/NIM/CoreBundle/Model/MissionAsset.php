<?php

namespace NIM\CoreBundle\Model;

use NIM\FormBundle\Model\Core\TimestampableTrait;
use Sylius\Component\Resource\Model\TimestampableInterface;

class MissionAsset implements TimestampableInterface
{
    use TimestampableTrait;

    protected $id;
    protected $file;

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $file
     *
     * @return $this
     */
    public function setFile($file)
    {
        $this->file = $file;
        return $this;
    }

    /**
     * @return string
     */
    public function getFile()
    {
        return $this->file;
    }
}
