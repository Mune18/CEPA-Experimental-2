import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { RouterOutlet } from '@angular/router';
import {MatSidenavModule} from '@angular/material/sidenav';
import { FormsModule } from '@angular/forms';
import {MatCommonModule} from '@angular/material/core';
import {MatToolbarModule} from '@angular/material/toolbar';
import {MatIconModule} from '@angular/material/icon';
import {MatListModule} from '@angular/material/list';
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-sidenav',
  standalone: true,
  imports: [
      RouterOutlet,
      MatSidenavModule,
      FormsModule,
      MatCommonModule,
      MatToolbarModule,
      MatIconModule,
      MatListModule,
      CommonModule
  ],
  templateUrl: './sidenav.component.html',
  styleUrl: './sidenav.component.css'
})
export class SidenavComponent implements OnInit {
  title = 'CEPA';
  opened: boolean = false;
  currentDateTime: Date = new Date();

  constructor(private router: Router) { }

  navigateToHome() {
    this.router.navigate(['/home']);
  }

  navigateToEventManagement() {
    this.router.navigate(['/eventmanagement']);
  }
  
  navigateToParticipantManagement() {
    this.router.navigate(['/participantmanagement']);
  }

  navigateToMailer() {
    this.router.navigate(['/mailer']);
  }
  
  navigateToAboutUs() {
    this.router.navigate(['/AboutUs']);
  }

  ngOnInit(): void {    
    setInterval(() => {
      this.currentDateTime = new Date();
    }, 1000);
  }
}
