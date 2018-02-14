import { Component, OnInit, Input } from '@angular/core';
import { Contact } from '../shared/contact';

@Component({
  selector: 'app-contact-table',
  templateUrl: './contact-table.component.html',
  styleUrls: ['./contact-table.component.css']
})
export class ContactTableComponent implements OnInit {

  // @Input()
  // contacts: Contact[];

  contacts: Contact[] = [
    {
      firstName: 'Donald',
      lastName: 'Trump',
      email: 'donaldt@whitehouse.gov',
      phone: 123456789
    },
    {
      firstName: 'Mike',
      lastName: 'Pence',
      email: 'mikep@whitehouse.gov',
      phone: 987654321
    }
  ];

  constructor() { }

  ngOnInit() {
  }



}
