import { Component } from '@angular/core';
import { Category } from './shared/category';
import { Item } from './shared/item';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {

  title = 'Items';


  phone: Category = {
    name: 'Phone',
    item: [
      {
        name: 'iPhone',
        price: 699
      },
      {
        name: 'iPhone X',
        price: 999
      }
    ]
  };

  book: Category = {
    name: 'Book',
    item: [
      {
        name: 'Harry Potter',
        price: 36
      },
      {
        name: 'The Giver',
        price: 14
      }
    ]
  };

  computer: Category = {
    name: 'Computer',
    item: [
      {
        name: 'Dell',
        price: 899
      }
    ]
  };

  music: Category = {
    name: 'Music',
    item: [
      {
        name: 'Piano Guys',
        price: 20
      }
    ]
  };



}
