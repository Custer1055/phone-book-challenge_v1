import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';
import { map, tap } from 'rxjs/operators';
import { Contact, ContactsResponse } from '../models/contact.model';

@Injectable({
  providedIn: 'root'
})
export class ApiService {
  private apiUrl = 'http://localhost:9001/api/';

  constructor(private http: HttpClient) { }

  isAuthenticated() {
    return localStorage.getItem('token') !== null;
  }

  login(email: string, password: string): Observable<boolean> {
    return this.http.post<any>(this.apiUrl + 'login', { email, password }).pipe(
      tap((response: any) => {
        if (response && response.token) {
          localStorage.setItem('token', response.token);
          localStorage.setItem('user', JSON.stringify(response.user));
          return true;
        } else {
          return false;
        }
      })
    );
  }

  getContacts(): Observable<Contact[]> {
    const token = localStorage.getItem('token');
    const headers = new HttpHeaders().set('Authorization', `Bearer ${token}`);

    return this.http.get<ContactsResponse>(this.apiUrl + 'contacts', { headers }).pipe(
      map(response => response.data)
    );
  }
}