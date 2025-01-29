import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, ReactiveFormsModule, Validators } from '@angular/forms';
import { ApiService } from '../services/api.service';
import { Router } from '@angular/router';
import { catchError, tap } from 'rxjs/operators';
import { of } from 'rxjs';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss'],
  imports: [ReactiveFormsModule],
  standalone: true
})
export class LoginComponent implements OnInit {
  public loginForm!: FormGroup;
  public isAuthenticating = false;

  constructor(private formBuilder: FormBuilder, private apiService: ApiService, private router: Router) { }

  ngOnInit(): void {
    this.loginForm = this.formBuilder.group({
      email: ['', [Validators.required, Validators.email]],
      password: ['', Validators.required]
    });
  }

  onSubmit(): void {
    if (this.loginForm?.valid) {
      this.isAuthenticating = true;
      this.apiService.login(this.loginForm.value.email, this.loginForm.value.password).pipe(
        tap((success) => {
          this.isAuthenticating = false;
          if (success) {
            this.router.navigate(['/']);
          } else {
            console.error('Login failed');
          }
        }),
        catchError((error) => {
          this.isAuthenticating = false;
          console.error('An error occurred:', error);
          return of(null);
        })
      ).subscribe();
    }
  }
}