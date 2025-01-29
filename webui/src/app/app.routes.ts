import { Routes } from '@angular/router';
import { ProfileManagementComponent } from './profile/profile-management/profile-management.component';
import { ContactsPageComponent } from './contacts/contacts-page/contacts-page.component';
import { HistoryPageComponent } from './history/history-page/history-page.component';
import { LoginComponent } from './login/login.component';
import { AuthGuard } from './services/auth-guard.service';

export const routes: Routes = [
    { path: 'login', component: LoginComponent },
    { path: 'profile', component: ProfileManagementComponent, canActivate: [AuthGuard] },
    { path: 'contacts', component: ContactsPageComponent, canActivate: [AuthGuard] },
    { path: 'history', component: HistoryPageComponent, canActivate: [AuthGuard] }
];
