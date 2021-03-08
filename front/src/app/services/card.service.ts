import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { HttpHeaders } from '@angular/common/http';
import { AppSettings } from '../../shared/appsettings';

import { Observable } from 'rxjs/internal/Observable';
import { Card } from "../models/card";

@Injectable({
  providedIn: 'root'
})
export class CardService {

  constructor(private http: HttpClient) {}

  shuffle(): Observable<Card[]>{
      const headers = new HttpHeaders()
          .set('content-type', 'application/json')
          .set('accept', 'application/json');

      return this.http.get<Card[]>(AppSettings.apibaseurl + 'api/cards/shuffle', { headers });
  }

    OrderByRank(cards: Card[]): Observable<Card[]>{
        const headers = new HttpHeaders()
            .set('content-type', 'application/json')
            .set('accept', 'application/json');

        return this.http.post<Card[]>(AppSettings.apibaseurl + 'api/cards/order-by-rank', { headers, cards });
    }

    OrderBySuit(cards: Card[]): Observable<Card[]>{
        const headers = new HttpHeaders()
            .set('content-type', 'application/json')
            .set('accept', 'application/json');

        return this.http.post<Card[]>(AppSettings.apibaseurl + 'api/cards/order-by-suit', { headers, cards });
    }
}
