<?php

namespace App\Controller;

use App\Config\CardsUtils;
use App\Entity\Card;
use App\Service\CardService;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @Route("/api/cards")
 */
class ApiCardController extends AbstractController
{
    /**
     * @Route("/shuffle", name="api_shuffle_cards", methods={"GET"})
     */
    public function shuffleAction(SerializerInterface $serializer)
    {
        $randomDiamondCards = CardsUtils::getRandomDiamondCards(3);
        $randomClubCards = CardsUtils::getRandomClubCards(3);
        $randomHeartCards = CardsUtils::getRandomHeartCards(3);
        $randomSpadesCards = CardsUtils::getRandomSpadesCards(3);

        $cards = CardResponseFactory::formatCardShuffle(
            $randomDiamondCards,
            $randomClubCards,
            $randomHeartCards,
            $randomSpadesCards
        );

        $json = $serializer->serialize($cards, 'json');
        $response = new JsonResponse($json, 200, [], true);

        return $response;
    }

    /**
     * @Route("/order-by-rank", name="api_order_by_rank", methods={"POST"})
     */
    public function orderByRankAction(SerializerInterface $serializer, Request $request, CardService $cardService)
    {
        $payloadData = [];

        if ($content = $request->getContent()) {
            $payloadData = json_decode($content, true);
        }

        $cards = $cardService->orderByRank($payloadData['cards']);

        $json = $serializer->serialize($cards, 'json');
        $response = new JsonResponse($json, 200, [], true);

        return $response;
    }

    /**
     * @Route("/order-by-suit", name="api_order_by_suit", methods={"POST"})
     */
    public function orderBySuitAction(SerializerInterface $serializer, Request $request, CardService $cardService)
    {
        $payloadData = [];

        if ($content = $request->getContent()) {
            $payloadData = json_decode($content, true);
        }

        $cards = $cardService->orderBySuit($payloadData['cards']);

        $json = $serializer->serialize($cards, 'json');
        $response = new JsonResponse($json, 200, [], true);

        return $response;
    }
}
