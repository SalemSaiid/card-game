import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';

const AUTH_API = 'http://localhost:8001/CARDGAME/public/index.php/api/';

const httpOptions = {
    headers: new HttpHeaders({ 'Content-Type': 'application/json' })
};

@Injectable({
    providedIn: 'root'
})
export class AuthService {

    constructor(private http: HttpClient) { }

    login(credentials:any): Observable<any> {
        return this.http.post(AUTH_API + 'login_check', {
            username: credentials.username,
            password: credentials.password
        }, httpOptions);
    }

    register(user:any): Observable<any> {
        return this.http.post(AUTH_API + 'register', {
            username: user.username,
            email: user.email,
            password: user.password
        }, httpOptions);
    }
}