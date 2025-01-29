import { Component } from '@angular/core';
import { MatToolbarModule } from '@angular/material/toolbar';
import { MatButtonModule } from '@angular/material/button';
import { MatListModule } from '@angular/material/list';
import { RouterModule } from '@angular/router';

@Component({
  selector: 'app-mainnav',
  standalone: true,
  imports: [
    MatButtonModule,
    MatToolbarModule,
    MatListModule,
    RouterModule
  ],
  templateUrl: './mainnav.component.html',
  styleUrl: './mainnav.component.scss'
})
export class MainnavComponent {

}
