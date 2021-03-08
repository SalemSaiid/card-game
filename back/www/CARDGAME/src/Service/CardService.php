<?php

namespace App\Service;

use App\Config\CardsUtils;

class CardService
{
    /**
     * Order by rank
     */
    public function orderByRank($cards) {
        foreach ($cards as $key => $card){
            $cards[$key]['value'] = self::getIntegerValues($card['value']);
        }

        $columns = array_column($cards, 'value');
        array_multisort($columns, SORT_ASC, $cards);

        return self::getDataWhithStringValues($cards);
    }

    /**
     * Order by suit
     */
    public function orderBySuit($cards) {
        $clubCards = [];
        $heartCards = [];
        $diamondCards = [];
        $spadesCards = [];

        foreach ($cards as $card){
            $card['value'] = self::getIntegerValues($card['value']);

            if($card['suit'] == CardsUtils::CARD_TYPE_SPADES){
                array_push($spadesCards, $card);
            }

            if($card['suit'] == CardsUtils::CARD_TYPE_HEART){
                array_push($heartCards, $card);
            }

            if($card['suit'] == CardsUtils::CARD_TYPE_DIAMOND){
                array_push($diamondCards, $card);
            }

            if($card['suit'] == CardsUtils::CARD_TYPE_CLUB){
                array_push($clubCards, $card);
            }
        }

        $data = self::sortAndMergeTables($clubCards,$heartCards,$diamondCards,$spadesCards);

        return self::getDataWhithStringValues($data);
    }

    private function getIntegerValues($value){
        switch ($value){
            case 'J': return 11;
            case 'Q': return 12;
            case 'K': return 13;
            case 'A': return 14;
            default: return $value;
        }
    }

    private function getDataWhithStringValues($dataCards){
        foreach ($dataCards as $key => $card){
            switch ($card['value']){
                case '11':  $dataCards[$key]['value'] = 'J'; break;
                case '12': $dataCards[$key]['value'] = 'Q';  break;
                case '13': $dataCards[$key]['value'] = 'K';  break;
                case '14': $dataCards[$key]['value'] = 'A';  break;
                default: $dataCards[$key]['value'] = $card['value'];
            }
        }

        return $dataCards;
    }

    private function sortAndMergeTables($clubCards,$heartCards,$diamondCards,$spadesCards){
        sort($clubCards);
        sort($heartCards);
        sort($diamondCards);
        sort($spadesCards);

        return array_merge($clubCards,$heartCards,$diamondCards,$spadesCards);
    }

}