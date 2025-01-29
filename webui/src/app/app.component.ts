import { Component } from '@angular/core';
import { RouterOutlet } from '@angular/router';
import { MainnavComponent } from "./navbar/mainnav/mainnav.component";

@Component({
  selector: 'app-root',
  standalone: true,
  templateUrl: './app.component.html',
  styleUrl: './app.component.scss',
  imports: [RouterOutlet, MainnavComponent]
})
export class AppComponent {
  title = 'phone-book';
}
