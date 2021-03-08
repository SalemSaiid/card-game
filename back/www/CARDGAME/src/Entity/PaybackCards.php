<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * Card
 */
class PaybackCards
{
    /**
     * @var ArrayCollection
     */
    private $cards;

    /**
     * @return ArrayCollection
     */
    public function getCards()
    {
        return $this->cards;
    }

    /**
     * @param ArrayCollection $cards
     * @return PaybackCards
     */
    public function setCards($cards)
    {
        $this->cards = $cards;
        return $this;
    }
}
