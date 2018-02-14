import { Component } from '@angular/core';
import { Contact } from './shared/contact';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'app';


  // contacts: Contact[] = [
  //   {
  //     firstName: 'Donald',
  //     lastName: 'Trump',
  //     email: 'donaldt@whitehouse.gov',
  //     phone: 123456789
  //   },
  //   {
  //     firstName: 'Mike',
  //     lastName: 'Pence',
  //     email: 'mikep@whitehouse.gov',
  //     phone: 987654321
  //   }
  // ];

}
