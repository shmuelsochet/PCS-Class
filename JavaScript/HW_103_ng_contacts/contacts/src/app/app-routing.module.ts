import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { ContactTableComponent } from './contact-table/contact-table.component';
import { AddContactFormComponent } from './add-contact-form/add-contact-form.component';

const routes: Routes = [
  {
    path: '',
    pathMatch: 'full',
    redirectTo: 'contacts'
  },
  {
    path: 'contacts',
    component: ContactTableComponent,
  },
  {
    path: 'addContact',
    component: AddContactFormComponent
  }

];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
