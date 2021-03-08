<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Card
 */
class Card
{
    /**
     * @var string
     */
    private $suit;

    /**
     * @var string
     */
    private $value;

    /**
     * @return string
     */
    public function getSuit()
    {
        return $this->suit;
    }

    /**
     * @param string $suit
     * @return Card
     */
    public function setSuit($suit)
    {
        $this->suit = $suit;
        return $this;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return Card
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }
}
