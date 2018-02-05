import { Component, Input } from '@angular/core';
import { Person } from '../shared/person';
import { Address } from '../shared/address';

@Component({
  selector: 'app-person',
  templateUrl: './person.component.html',
  styleUrls: ['./person.component.css']
})
export class PersonComponent {

  @Input()
  person: Person;

  // Mr. Lubowsky didn't put the address here
  // address: Address = {
  //   street: '600 Pennsylvania Ave. NW',
  //   city: 'Washington',
  //   state: 'D.C.',
  //   zip: '20500'
  // };

  addFriend(friend: string) {
    if (!this.person.friends) {
      this.person.friends = [];
    }
    this.person.friends.push(friend);
  }

  deleteFriend(index: number) {
    this.person.friends.splice(index, 1);
  }

}
