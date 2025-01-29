import { Component, Input } from '@angular/core';
import { TableAction } from '../../models/table-action.model';

@Component({
  selector: 'app-data-grid',
  standalone: true,
  imports: [],
  templateUrl: './data-grid.component.html',
  styleUrl: './data-grid.component.scss'
})
export class DataGridComponent {
  @Input() loading: boolean = true;
  @Input() data: any[] = [];
  @Input() headers: string[] = [];
  @Input() actions: TableAction[] = [];
}
