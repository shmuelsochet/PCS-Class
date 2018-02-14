import { Component } from '@angular/core';
import { Blog } from './shared/blog';
import { Post } from './shared/post';
import { Comment } from './shared/comment';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'Awesome Blogs';

  blogs: Blog[] = [
    {
      id: 1,
      name: 'Leanne Graham',
      website: 'hildegard.org',
      company: 'Romaguera-Crona',
      posts: [
        {
          id: 1,
          userId: 1,
          title: 'test',
          body: 'This is a body',
          comments: [
            {
              postId: 1,
              id: 1,
              name: 'id labore ex et quam laborum',
              email: 'Eliseo@gardner.biz',
              body: 'laudantium enim quasi est quidem magnam voluptate ipsam eos\ntempora quo necessitatibus' +
                '\ndolor quam autem quasi\nreiciendis et nam sapiente accusantium'
            },
            {
              postId: 1,
              id: 2,
              name: 'quo vero reiciendis velit similique earum',
              email: 'Jayne_Kuhic@sydney.com',
              body: 'est natus enim nihil est dolore omnis voluptatem numquam\net omnis occaecati quod ullam' +
                'at\nvoluptatem error expedita pariatur\nnihil sint nostrum voluptatem reiciendis et'
            },
            {
              postId: 1,
              id: 3,
              name: 'odio adipisci rerum aut animi',
              email: 'Nikita@garfield.biz',
              body: 'quia molestiae reprehenderit quasi aspernatur\naut expedita occaecati aliquam eveniet' +
                'laudantium\nomnis quibusdam delectus saepe quia accusamus maiores nam est\ncum et ducimus et vero' +
                'voluptates excepturi deleniti ratione'
            },
          ],

        },
        {
          id: 2,
          userId: 1,
          title: 'another test',
          body: 'This is id 2 post a body'

        },

      ],

    },
    {
      id: 2,
      name: 'Ervin Howell',
      website: 'anastasia.net',
      company: 'Deckow-Crist',
      posts: [
        {
          id: 1,
          userId: 2,
          title: 'test 3',
          body: 'This is a body'

        },
        {
          id: 2,
          userId: 2,
          title: 'another test 4',
          body: 'This is id 2 post body'

        },
      ]

    },
  ];

}
