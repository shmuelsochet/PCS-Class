import { Component, OnInit, Input } from '@angular/core';
import { Contact } from '../shared/contact';

@Component({
  selector: 'app-add-contact-form',
  templateUrl: './add-contact-form.component.html',
  styleUrls: ['./add-contact-form.component.css']
})
export class AddContactFormComponent implements OnInit {

  @Input()
  contacts: Contact[];

  constructor() { }

  ngOnInit() {
  }

  addContact(last: string, first: string, email: string, phone: number) {
    const contact: Contact = {

      lastName: last,
      firstName: first,
      email: email,
      phone: phone
    };

    console.log(contact, this.contacts);

    this.contacts.push(contact);

    console.log(this.contacts);
  }

}
