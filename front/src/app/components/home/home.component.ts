import { Component, OnInit } from '@angular/core';
import { Card } from "../../models/card";
import { CardService } from "../../services/card.service";

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})
export class HomeComponent implements OnInit {

  isShuffled = false;

  cards: Card[] = [];
  cardsOrderByRank: Card[] = [];
  cardsOrderBySuit: Card[] = [];

  constructor(private cardService: CardService) {}

  ngOnInit(): void {}

  Shuffle(){
      this.isShuffled = true;
      this.shuffleCards();
      this.cardsOrderByRank = [];
      this.cardsOrderBySuit = [];
  }

  shuffleCards(): void{
      this.cardService.shuffle()
            .subscribe(cards => this.cards = cards);

    }

  OrderByRank(): void{
        this.cardService.OrderByRank(this.cards)
            .subscribe(cards => this.cardsOrderByRank = cards);
    }

  OrderBySuit(): void{
      this.cardService.OrderBySuit(this.cards)
            .subscribe(cards => this.cardsOrderBySuit = cards);
  }

}
