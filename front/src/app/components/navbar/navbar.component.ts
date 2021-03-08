import { Component, OnInit } from '@angular/core';

import { TokenStorageService } from "../../services/token-storage.service";
import { Router } from "@angular/router";

@Component({
  selector: 'app-navbar',
  templateUrl: './navbar.component.html',
  styleUrls: ['./navbar.component.css']
})
export class NavbarComponent implements OnInit {

    isLoggedIn = false;

    constructor(private tokenStorage: TokenStorageService, private router: Router) { }

    ngOnInit() {
        if (this.tokenStorage.getToken()) {
            this.isLoggedIn = true;
        }
    }

    public logout() {
       this.tokenStorage.signOut();
        window.location.reload();
    }

}
