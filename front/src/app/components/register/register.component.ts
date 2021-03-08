import { Component, OnInit } from '@angular/core';
import { AuthService } from '../../services/auth.service';
import { TokenStorageService } from "../../services/token-storage.service";
import { Router } from "@angular/router";

@Component({
    selector: 'app-register',
    templateUrl: './register.component.html',
    styleUrls: ['./register.component.css']
})
export class RegisterComponent implements OnInit {
    form: any = {};
    isSuccessful = false;
    isSignUpFailed = false;
    errorMessage = '';

    constructor(private authService: AuthService, private tokenStorage: TokenStorageService, private router: Router) { }

    ngOnInit() {
        if (this.tokenStorage.getToken()) {
            this.router.navigate(['login']);
        }
    }

    onSubmit() {
        this.authService.register(this.form).subscribe(
            data => {
                console.log(data);
                this.isSuccessful = true;
                this.isSignUpFailed = false;
            },
            err => {
                this.errorMessage = err.error.message;
                this.isSignUpFailed = true;
            }
        );
    }
}