// auth.service.ts

import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class AuthService {
  private apiUrl = 'http://localhost:3000/Desktop/CEPAgit/CEPAngit/cepaapi/Login/login.php'; // Your backend API URL

  constructor(private http: HttpClient) { }

  login(id: number, password: string): Observable<any> {
    return this.http.post<any>(`${this.apiUrl}/login`, { id, password });
  }
}
