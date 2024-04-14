import { Component } from '@angular/core';
import { AuthService } from './auth.service';
import { Router } from '@angular/router';
import { FormsModule } from '@angular/forms';


@Component({
  selector: 'app-login',
  standalone: true,
  imports: [FormsModule],
  templateUrl: './login.component.html',
  styleUrl: './login.component.css'
})

export class LoginComponent {
  
  id: string = '';
  password: string = '';

  constructor(
    private router: Router,
    private authService: AuthService
  ) { }

  onSubmit() {
    this.authService.login(+this.id, this.password).subscribe(
      response => {
        console.log('Login response:', response);
        if (response.success) {
          console.log('Login successful');
          // Redirect to the home page upon successful login
          this.router.navigate(['/home']);
        } else {
          console.error('Login failed:', response.message);
          // Handle login failure (e.g., display error message to user)
        }
      },
      error => {
        console.error('Login error:', error);
        // Handle error (e.g., display error message to user)
      }
    );
  }
}


    
