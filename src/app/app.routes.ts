import { RouterModule, Routes } from '@angular/router';
import { NgModule } from '@angular/core';
import { HomeComponent } from './Admin/home/home.component';
import { ParticipantmanagementComponent } from './Admin/participantmanagement/participantmanagement.component';
import { EventmanagementComponent } from './Admin/eventmanagement/eventmanagement.component';
import { AboutusComponent } from './Admin/aboutus/aboutus.component';
import { LoginComponent } from './Admin/login/login.component';
import { SidenavComponent } from './Admin/sidenav/sidenav.component';
import { RegisterComponent } from './register/register.component';
import { MailerComponent } from './Admin/mailer/mailer.component';
import { HttpClientModule } from '@angular/common/http';
import { FormsModule } from '@angular/forms';


export const routes: Routes = [
  {
    path: 'register',
    component: RegisterComponent,
  },
  {
    path: 'login', // Corrected path for login route
    component: LoginComponent,
  },
  {
    path: '',
    component: SidenavComponent,
    children: [
      {
        path: 'home',
        component: HomeComponent,
      },
      {
        path: 'eventmanagement',
        component: EventmanagementComponent,
      },
      {
        path: 'participantmanagement',
        component: ParticipantmanagementComponent,
      },
      {
        path: 'mailer',
        component: MailerComponent,
      },
      {
        path: 'AboutUs',
        component: AboutusComponent,
      },
      {
        path: '',
        redirectTo: '/login',
        pathMatch: 'full',
      },
    ],
  },
  {
    path: '**',
    redirectTo: '/login',
  },
];

@NgModule({
    imports: [
      RouterModule.forRoot(routes),
      HttpClientModule,
      FormsModule
    ],
    exports: [RouterModule],

})
export class AppRoutingModule { }
