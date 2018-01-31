import { Component } from '@angular/core';
import { Person } from './shared/person';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'app';

  person: Person = {
    firstName: 'Donald',
    lastName: 'Trump'
  };
}
