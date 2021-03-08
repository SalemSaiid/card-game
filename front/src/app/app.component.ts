import {Component, OnInit} from '@angular/core';
import { TokenStorageService } from './services/token-storage.service';

@Component({
    selector: 'app-root',
    templateUrl: './app.component.html',
    styleUrls: ['./app.component.css']
})
export class AppComponent implements OnInit  {
    title = 'CARD GAME';
    version = 'Angular version 11.1.0';

    roles: string[] = [];
    isLoggedIn = false;
    username: string = '';

    constructor(private tokenStorageService: TokenStorageService) { }

    ngOnInit() {
        this.isLoggedIn = !!this.tokenStorageService.getToken();

        if (this.isLoggedIn) {
            const user = this.tokenStorageService.getUser();

            this.username = user;
        }
    }

    logout() {
        this.tokenStorageService.signOut();
        window.location.reload();
    }
}
