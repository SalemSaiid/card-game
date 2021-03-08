<?php

namespace App\Config;

class CardsUtils
{
    const CARD_TYPE_DIAMOND = "Diamond";
    const CARD_TYPE_HEART   = "Heart";
    const CARD_TYPE_CLUB    = "Club";
    const CARD_TYPE_SPADES  = "Spades";

    const CARDS_UTILS = [
        "cards" => [
            self::CARD_TYPE_DIAMOND => ['A', 2, 3, 4, 5, 6, 7, 8, 9, 10, 'J', 'Q', 'K'],
            self::CARD_TYPE_HEART   => ['A', 2, 3, 4, 5, 6, 7, 8, 9, 10, 'J', 'Q', 'K'],
            self::CARD_TYPE_CLUB    => ['A', 2, 3, 4, 5, 6, 7, 8, 9, 10, 'J', 'Q', 'K'],
            self::CARD_TYPE_SPADES  => ['A', 2, 3, 4, 5, 6, 7, 8, 9, 10, 'J', 'Q', 'K'],
        ]
    ];

    public static function getRandomDiamondCards($number){
        return self::getRandomData(self::CARDS_UTILS['cards'][self::CARD_TYPE_DIAMOND],$number);
    }

    public static function getDiamondCards(){
        return self::CARDS_UTILS['cards'][self::CARD_TYPE_DIAMOND];
    }

    public static function getRandomHeartCards($number){
        return self::getRandomData(self::CARDS_UTILS['cards'][self::CARD_TYPE_HEART],$number);
    }

    public static function getHeartCards(){
        return self::CARDS_UTILS['cards'][self::CARD_TYPE_HEART ];
    }

    public static function getRandomClubCards($number){
        return self::getRandomData(self::CARDS_UTILS['cards'][self::CARD_TYPE_CLUB],$number);
    }

    public static function getClubCards(){
        return self::CARDS_UTILS['cards'][self::CARD_TYPE_CLUB];
    }

    public static function getRandomSpadesCards($number){
        return self::getRandomData(self::CARDS_UTILS['cards'][self::CARD_TYPE_SPADES],$number);
    }

    public static function getSpadesCards(){
        return self::CARDS_UTILS['cards'][self::CARD_TYPE_SPADES];
    }

    public static function getSuits(){
        return array_keys(self::CARDS_UTILS['cards']);
    }

    public static function getRandomData($array, $number){
        $randomData = [];
        $keys = array_rand ( $array , $number);

        foreach ($keys as $key){
            array_push($randomData, $array[$key]);
        }

        return $randomData;
    }
}
