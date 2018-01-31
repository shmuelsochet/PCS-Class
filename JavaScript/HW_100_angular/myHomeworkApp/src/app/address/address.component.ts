import { Component, Input } from '@angular/core';
import { Address } from '../shared/address';
import { Person } from '../shared/person';

@Component({
  selector: 'app-address',
  templateUrl: './address.component.html',
  styleUrls: ['./address.component.css']
})
export class AddressComponent {

  @Input()
  address: Address;

  @Input() person: Person;
}
