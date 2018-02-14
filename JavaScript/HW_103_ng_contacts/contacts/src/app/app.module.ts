import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';

import { AppComponent } from './app.component';
import { ContactTableComponent } from './contact-table/contact-table.component';
import { AddContactFormComponent } from './add-contact-form/add-contact-form.component';


@NgModule({
  declarations: [
    AppComponent,
    ContactTableComponent,
    AddContactFormComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
