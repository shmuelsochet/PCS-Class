import { Component } from '@angular/core';
import { Person } from './shared/person';
import { Address } from './shared/address';



@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'app';

  person: Person = {
    firstName: 'Donald',
    lastName: 'Trump',

    // I believe this is how Mr. Lubowsky added the person's address.
    address: {
      street: '1600 Pennsylvania Ave. NW',
      city: 'Washington',
      state: 'D.C.',
      zip: '20500'
    },
    friends: ['Nunes', 'Pence', 'Rubashkin']


  };



}
