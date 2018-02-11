import { Component, Input } from '@angular/core';
import { Blog } from '../shared/blog';

@Component({
  selector: 'app-blog-list',
  templateUrl: './blog-list.component.html',
  styleUrls: ['./blog-list.component.css']
})
export class BlogListComponent {

  @Input()
  blogs: Blog[];


}
