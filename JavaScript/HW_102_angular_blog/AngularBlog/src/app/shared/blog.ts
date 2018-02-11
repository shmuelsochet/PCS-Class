import { Post } from './post';
export interface Blog {
    id: number;
    name: string;
    website: string;
    company: string;
    posts?: Post[];
}
