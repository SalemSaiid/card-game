<?php

namespace App\Controller;

use App\Config\CardsUtils;
use App\Entity\Card;
use Doctrine\Common\Collections\ArrayCollection;

class CardResponseFactory
{
    public static function formatCardShuffle($randomDiamondCards, $randomClubCards, $randomHeartCards, $randomSpadesCards)
    {
        $cards = new ArrayCollection();

        foreach ($randomDiamondCards as $randomDiamondCard) {
            $cards->add((new Card())->setSuit(CardsUtils::CARD_TYPE_DIAMOND)->setValue($randomDiamondCard));
        }

        foreach ($randomClubCards as $randomClubCard) {
            $cards->add((new Card())->setSuit(CardsUtils::CARD_TYPE_CLUB)->setValue($randomClubCard));
        }

        foreach ($randomHeartCards as $randomHeartCard) {
            $cards->add((new Card())->setSuit(CardsUtils::CARD_TYPE_HEART)->setValue($randomHeartCard));
        }

        foreach ($randomSpadesCards as $randomSpadesCard) {
            $cards->add((new Card())->setSuit(CardsUtils::CARD_TYPE_SPADES)->setValue($randomSpadesCard));
        }

        $cards  = $cards->toArray();
        Shuffle($cards);


        return CardsUtils::getRandomData($cards, 10);
    }
}
